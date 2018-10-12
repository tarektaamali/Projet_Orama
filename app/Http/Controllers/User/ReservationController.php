<?php

namespace App\Http\Controllers\User;
use App\Model\Projet;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    public function create()
    {
        $services =Service::all();
        return view ('user.reserver',compact('services'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        request()->validate([

            'title' => 'required',
            'adresse' => 'required',
            'description' => 'required',



        ]);
        $request->user();
        $reserver = new Projet();
        $reserver->titre= $request->title;
        $reserver->adresse= $request->adresse;
        $reserver->etat_id =1;
        $reserver->description= $request->description;
        $reserver->user_id= $request->user()->id;
        $reserver->service_id= $request->service;


        $reserver->save();

        return redirect()->route('home');



    }
}
