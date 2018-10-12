<?php

namespace App\Http\Controllers\Api;

use App\Model\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthController;
use JWTAuth;
use JWTAuthException;

class ProjetController extends Controller
{
  public function __construct()
    {
        $this->middleware(
            'jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = JWTAuth::toUser($request['token']);
        $projets =Projet::with('service')->with('region')->with('etat')->with('user')->with('fournisseur')->with('propositions')->where('user_id',$user->id)->orderBy('created_at', 'desc')->get() ;
        $response = [
            'message' => 'List of my projet',
            'projets' => $projets
        ];
        return response()->json($response, 200);



    }
    public function index1(Request $request)
    {

        $user = JWTAuth::toUser($request['token']);
        $projets =Projet::with('service')->with('client')->where('etat_id',3)->where('admin_id',$user->id)->get() ;
        return response()->json($projets, 200);

        //    return view ('admin.projet.view',compact('projets'));
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
        $this->validate($request, [
            'objet' => 'required',
            'description' => 'required',
            'lieu'=>'required',
            'service_id'=>'required',
            'region_id'=>'required',
        ]);


        $objet = $request->input('objet');
        $description = $request->input('description');
        $lieu = $request->input('lieu');
        $service_id = $request->input('service_id');
        $demandeur_id = $user->id;
        $region_id = $request->input('region_id');
        //return $request ;
        $projet = new Projet() ;
        $projet->objet= $objet;
        $projet->description= $description;
        $projet->service_id= $service_id;
        $projet->lieu= $lieu;
        $projet->user_id= $demandeur_id;
        $projet->region_id= $region_id;
        $projet->etat_id=1;
        if ($projet->save()) {

            $response = [
                'message' => 'projet created',
                'projet' => $projet,
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
    public function show($id)
    {
        $projet = Projet:: with('service')->with('user')->where('id', $id)->firstOrFail();
       
        $response = [
            'message' => 'projet information',
            'projet' => $projet
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
