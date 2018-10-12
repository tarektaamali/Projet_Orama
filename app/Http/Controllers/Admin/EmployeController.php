<?php

namespace App\Http\Controllers\Admin;

use App\Model\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employe;
use App\Model\admin;

class EmployeController extends Controller
{
/*
 * @midelware
 */
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
        $employes=Employe::all();
        //        $reservations =Reservation::with('chefs')->with('services')->with('users')->where('etat','non validé')->get() ;

        // $arr=Array('materiel'=>$materiel);
        return view ('admin.Employee.view',compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins=admin\admin::where('role','0')->get();

        return view ('admin\Employee\add',compact('admins'));

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employes',
            'phone' => 'required|numeric',
        ]);
        $employe = new Employe;
        $employe->firstname= $request->firstname ;
        $employe->lastname=$request->lastname ;
        $employe->email= $request->email;
        $employe->phone= $request->phone;
        //$employe->admin_id= $request->equipe;


        $employe->save();

        return redirect()->route('employes.index');



        // return $request;
        return redirect(route('users.index'));
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
        $admins=admin\admin::all();
        $employe = Employe::where('id',$id)->first();
        return view ('admin.Employee.update',compact('employe','admins'));

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
        ]);
        $employe =Employe::find($id);
        $employe->firstname= $request->firstname ;
        $employe->lastname= $request->lastname ;
        $employe->email= $request->email;
        $employe->phone= $request->phone;
        $employe->admin_id= $request->chef;
        $employe->save();

        return redirect()->route('employes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        employe::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
