<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\Materiel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $materiels=Materiel::with('projects')->get();
        //        $reservations =Reservation::with('chefs')->with('services')->with('users')->where('etat','non validé')->get() ;
            return $materiels;
        // $arr=Array('materiel'=>$materiel);
      //  return view ('admin.Materiel.view',compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins=admin::all();
        return view ('admin\Materiel\add',compact('admins'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'libelle' => 'required|string|max:255',
            'nombre' => 'required|numeric',
            //  'password' => 'required|string|min:6|confirmed',
        ]);
        $materiel = new Materiel;
        $materiel->libelle= $request->libelle;
        $materiel->nombre= $request->nombre;
        $materiel->save();
        return redirect(route('materiels.index'));
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
        $admins=admin::all();
        //$materiel = Materiel::with('chefs')->where('id',$id)->first();
      //  return view ('admin.Materiel.update',compact('materiel','admins'));

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
        $this->validate($request,[
            'libelle' => 'required|string|max:255',
            'nombre' => 'required|numeric',
            //  'password' => 'required|string|min:6|confirmed',
        ]);
        $materiel = Materiel::find($id);
        $materiel->libelle= $request->libelle;
        $materiel->nombre= $request->nombre;
        $materiel->admin_id= $request->adminid;
        $materiel->save();
        return redirect(route('materiels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        materiel::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
