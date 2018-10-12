<?php

namespace App\Http\Controllers\Admin;

use App\Model\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
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
        $regions=Region::all();
        return view ('admin.Region.view',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin\Region\add');

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

            'titre' => 'required',

        ]);
        $region = new Region();
        $region->region= $request->titre;
        //$service->description= $request->description;
        $region->save();

        return redirect()->route('region.index');
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
        $region = Region::where('id',$id)->first();
        /*
                $service = Service::where('id',$id)->get();
        the result object inside table
       [{"id":1,"titre":"lllz","description":"zjjzjz","user_id":null,"created_at":"2018-03-11 20:23:19","updated_at":"2018-03-11 20:23:19"}]


        $service = Service::where('id',$id)->first();
     the result is object
        {"id":1,"titre":"lllz","description":"zjjzjz","user_id":null,"created_at":"2018-03-11 20:23:19","updated_at":"2018-03-11 20:23:19"}

        */
        return view ('admin.Region.update',compact('region'));

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
            'titre' => 'required',
        ]);

        //     return $request->all();
        $region = Region::find($id);
        $region->region= $request->titre;
        $region->save();




        return redirect()->route('region.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
