<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\Reservation;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reservations=Reservation::with('services')->get()->toArray();
//->where('etat','non validé')->
        $reservations =Reservation::with('chefs')->with('services')->with('users')->where('etat','non validé')->get() ;
  //return$reservations;
      //  $users1 = DB::table('reservations')->where('etat','completed')->count();
       // return$reservations;
        return view ('admin.Reservation.view',compact('reservations'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        //$reservations=Reservation::with('services')->get()->toArray();
//->where('etat','non validé')->
        $reservations =Reservation::with('chefs')->with('services')->with('users')->where('etat','en cours')->get() ;
        //return$reservations;
        //  $users1 = DB::table('reservations')->where('etat','completed')->count();
        // return$reservations;
        return view ('admin.Reservation.view',compact('reservations'));
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
        $admins=admin::where('role','0')->get();
        $reservation = Reservation::where('id',$id)->first();
        return view ('admin.Reservation.update',compact('reservation','admins'));
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

        request()->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        //     return $request->all();
        $reservation = Reservation::find($id);
        $reservation->title= $request->title;
        $reservation->description= $request->description;
        $reservation->admin_id= $request->equipe;
        $reservation->save();




        return redirect()->route('reservation.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       reservation::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
