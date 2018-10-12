<?php

namespace App\Http\Controllers\Api;

use App\Model\Projet;
use App\Model\Proposition;
use App\Model\Region;
use App\Model\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;

class ProjetfController extends Controller
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
        $id1=$user->id;
        $services = User::find($id1)->services->toArray();

         $sregions = User::find($id1)->regions->toArray();


        $projets =Projet::with('user')->with('service')->where('realisateur_id',null)->whereIn('service_id', $services)->whereIn('region_id', $sregions)->orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List of all Project',
            'projets' => $projets
        ];
        return response()->json($response, 200);

    }
    public  function  index1(Request $request){
        $user = JWTAuth::toUser($request['token']);
        $id1=$user->id;
        $etat= $request->etat;
        if($etat ==2){
            $projets =Proposition::with('projet')->whereHas('projet', function ($query) {
                $query->where('etat_id', '=',2);
            })->where('user_id',$user->id)->get();

        }else if($etat ==3){
            $projets =Proposition::with('projet')->whereHas('projet', function ($query) {
                $query->where('etat_id',3);
            })->where('user_id',$user->id)->get();

        }
        else {
            $projets =Proposition::with('projet')->whereHas('projet', function ($query) {
                $query->where('etat_id', '=',4);
            })->where('user_id',$user->id)->get();

        }
        $response = [
            'message' => 'planning',
            'planning' => $projets
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
        //
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
