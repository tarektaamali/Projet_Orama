<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\Reservation;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use phpDocumentor\Reflection\Types\Null_;

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
        $reservations =Reservation::with('chefs')->with('services')->with('users')->where('etat','en attente')->get() ;
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
     *
     *
     *
     * @return  \Illuminate\Http\Response
     *
     *
     */
    public function planning(){
        /*
         *      true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
          if($data->count()) {
            foreach ($data as $key => $value) {
                if($value->start_date!=Null){




            }}
        }

         */
        $events = [];
        $data = Reservation::all();

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2018-04-04T0800', //start time (you can also use Carbon instead of DateTime)
            '2018-04-04T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );
        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2018-04-04T0800', //start time (you can also use Carbon instead of DateTime)
            '2018-04-04T0800', //end time (you can also use Carbon instead of DateTime)
            0 ,//optionally, you can specify an event ID,
            [
                'color' => '#f05050',
                'url' => 'pass here url and any route',
            ]
        );


        $calendar =Calendar::addEvents($events);
       // return $calendar;
        return view('admin.Plannification.Plannification', compact('calendar'));
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
               if($request->equipe == Null){
                  $etat="en attente";
               } else {
                   $etat="en Cours";
               }
              // return $request;

         $reservation = Reservation::find($id);
        $reservation->title= $request->title;
        $reservation->description= $request->description;
        $reservation->etat=$etat;
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
