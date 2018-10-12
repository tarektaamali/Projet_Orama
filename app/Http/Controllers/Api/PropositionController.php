<?php

namespace App\Http\Controllers\Api;

use App\Model\Projet;
use App\Model\Proposition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;

class PropositionController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'jwt.auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = JWTAuth::toUser($request['token']);
        $id1=$user->id;
        $propositions =Proposition::where('user_id',$id1)->with('user')->with('projet')->get() ;
        $response = [
            'message' => 'List of all Propositions',
            'propositions' => $propositions
        ];
        //return $propositions;
        return response()->json($response, 200);
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
        $user = JWTAuth::toUser($request['token']);
        $description = $request->input('description');
        $echenance= $request->input('echenance');
        $devis = $request->input('devis');
        $start_date = $request->input('start_date');
        $user_id = $user->id;
        $projet_id = $request->input('projet_id');
        $proposition = new Proposition() ;
        $proposition->devis= $devis;
        $proposition->echenance= $echenance;
        $proposition->description = $description ;
        $proposition->start_date= $start_date;
        $proposition->user_id= $user_id;
        $proposition->projet_id= $projet_id;
        if ($proposition->save()) {

            $response = [
                'message' => 'devis a été proposez',
            ];
            return response()->json($response, 201);
        }

        $response = [
            'message' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $projet_id=$id;
        $realisateur_id=$request['realisateur_id'];

        $propositions =Proposition::where('projet_id',$projet_id)->where('user_id',$realisateur_id)->firstOrFail();
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
        //
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
