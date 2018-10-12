<?php

namespace App\Http\Controllers\Api;

use App\Model\Projet;
use App\Model\Rapport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RapportController extends Controller
{

  /*  public function __construct()
    {
        $this->middleware(
            'jwt.auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
         *  'title' =>$faker->word ,
        'note'=>$faker->paragraph(),
        'img'=>'x0A7ra7sFk4dr8OdpwXU3e2Sp5GfNKuttUNUiLHH.jpeg',
        'projet_id'=>function(){
         *
         *
         */
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required',
            'projet_id' => 'required'
        ]);
        $rapport = new Rapport();
        if($request->hasFile('file')){
            $imageName= $request->file->store('public/blogimage');
            $file_name = $request->file('file')->hashName();
           $rapport->img=$file_name;
        }
        $rapport->title= $request->title;
        $rapport->note= $request->note;
        $rapport->projet_id= $request->projet_id;
        if($rapport->save()){
          /*  $rapport->save=[
                'href'=>'api/v1/rapport',
                'method'=>'POST',
                'params'=>'title,note,img,projet_id'
            ];*/

            $response=[
                'success'=>true,
                'rapport'=>$rapport
            ];
            return response()->json($response,201);
        }
        $response=[
            'success'=>false,
        ];
        return $response()->json($response,404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rapport = Rapport::with('projets')->with('projets.client')->where('id', $id)->first();
        if(!$rapport){
            return response()->json([
                'message' => 'Rapport not found'
            ], 404);
        }
        $response = [
            'message' => 'rapport information',
            'rapport' => $rapport
        ];
        return response()->json($response, 200);
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
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required',
            'projet_id' => 'required'
        ]);
        $title= $request->title;
        $note= $request->note;
        $projet_id= $request->projet_id;
        $rapport = Rapport::with('projets')->findOrFail($id);
        //!$meeting->users()->where('users.id', $user_id)->first()
        if(!$rapport->where('projet_id',$projet_id)->first()){
            return response()->json(['message' => 'user not registered for meeting, update not successful'], 401);
        }
        $rapport->title= $title;
        $rapport->note= $note;
        if(!$rapport->update()){
            return response()->json([
                'message' => 'Error during update'
            ], 404);
        }
        $rapport->view_meeting = [
            'href' => 'api/v1/meeting/' . $rapport->id,
            'method' => 'GET'
        ];
        $response = [
            'message' => 'Meeting Updated',
            'meeting' => $rapport
        ];
        return response()->json($response, 200);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $rapport = Rapport::findOrFail($id);
      //  $users = $meeting->users;
       // $meeting->users()->detach();
        if(!$rapport->delete()){
            return response()->json([
                'message' => 'Deletion Failed'
            ], 404);
        }
        $response = [
            'message' => 'Rapport deleted',
            'create' => [
                'href' => 'api/v1/meeting',
                'method' => 'POST',
                'params' => 'title, description, time'
            ]
        ];
        return response()->json($response, 200);//
    }
}
