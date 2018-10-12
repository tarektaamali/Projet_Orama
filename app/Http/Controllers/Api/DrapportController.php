<?php

namespace App\Http\Controllers\Api;

use App\Model\Rapport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $realisateur_id=4;
        $rapports =Rapport::whereHas('projets',function ($query) use ($realisateur_id){
            $query->where('realisateur_id',$realisateur_id);})->with('images')->latest('created_at')->get() ;
        $response = [
            'message' => 'List of all Projects',
            'rapports' => $rapports
        ];
        return response()->json($response, 200);
        }
        /* $feedbacks =Feedback::where('realisateur_id',$id1)->orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List of all Feedback',
            'Feedbacks' => $feedbacks
        ];
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
        $rapports =Rapport::with('images')->where('id',$id)->firstOrFail();
        $response = [
            'message' => 'projet',
            'rapport' => $rapports
        ];
        return response()->json($response, 200);


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
