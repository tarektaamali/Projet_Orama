<?php

namespace App\Http\Controllers\Api;

use App\Model\Proposition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropositiondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { //return $request;
        $projet_id = $request->input('projet_id');
        $propositions =Proposition::where('projet_id',$projet_id)->with('projet')->with('user')->get() ;
        $response = [
            'message' => 'List of all Propositions',
            'propositions' => $propositions
        ];
        //return $propositions;
        return response()->json($response, 200);    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Request $request)
    {
        $projet_id = $request->input('projet_id');
        $propositions =Proposition::where('projet_id',$projet_id)->where('status',1)->get() ;
        foreach ($propositions as $proposition){
            $propos=Proposition::find($proposition->id);
        $propos->status=0;
        if($propos->update()){
            $up="succes";
        }
        }
        return response()->json([
            'message' => "ok",
        ],201);
        //return $propositions;
        return response()->json($response, 200);    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {
        $projet_id = $request->input('projet_id');
        $id = $request->input('id');
        $propositions =Proposition::where('projet_id',$projet_id)->where('id','!=',$id)->where('status',1)->get() ;
        $propositions1 =Proposition::where('id','=',$id)->where('status',1)->get() ;
//            'current'=>$propositions1->count(),
        return response()->json([
            'message' => $propositions->count(),
        ],201);

           }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propositions =Proposition::where('id',$id)->with('projet')->with('user')->first() ;
        $response = [
            'message' => 'proposoition',
            'propositions' => $propositions
        ];
        //return $propositions;
        return response()->json($propositions, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $proposition = Proposition::find($id);
        $proposition->status = $request->input('status');
        if(   $proposition->update()){
            return response()->json([
                'message' => 'mise  a jour fait avec suceces',
            ],201);
        }
        return response()->json([
            'message' => 'failed_to_create_token',
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
