<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\Materiel;
use App\Model\Projet;
use App\Model\Proposition;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
class ProjetController extends Controller
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
        $now=\Carbon\Carbon::now()->format('Y-m-d');
//

       // $projets =Projet::with('service')->where('start_date', '=<', $now)->where('etat_id','1')->with('client')->get() ;
     $projets =Projet::with('service')->with('user')->get() ;
      //  $projets =Projet::with('service')->whereBetween('reservation_from', [$from_from, $to_from])->with('client')->get() ;

        return view ('admin.projet.view',compact('projets'));
      /*  $projets =Projet::with('chefs')->with('materiels')->with('service')->with('client')->where('etat','en Cours')->get() ;
   return $projets;*/

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index0()
    {

        $projets =Projet::with('user')->with('fournisseur')->with('service')->where('etat_id','1')->get() ;
//return $projets;
        $status=" liste des projets n'est pas validé";
        return view ('admin.projet.view',compact('projets','status'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $projets =Projet::with('user')->with('fournisseur')->with('service')->where('etat_id','2')->get() ;
        $status=" liste des projets En cours ";
        return view ('admin.projet.view',compact('projets','status'));
    }
    public function index2()
    {
        $projets =Projet::with('user')->with('fournisseur')->with('service')->where('etat_id','3')->get() ;
        $status=" liste des projets  Validé";
        return view ('admin.projet.view',compact('projets','status'));
    }
    public function index3()
    {     $projets =Projet::with('user')->with('fournisseur')->with('service')->where('etat_id','4')->get() ;
        $status=" liste des projets terminé";
        return view ('admin.projet.view',compact('projets','status'));
    }
    public function index4()
    {
        $projets =Projet::with('fournisseur')->with('service')->with('client')->where('etat_id','5')->get() ;
        $status=" liste des projets n'est pas validé";
        return view ('admin.projet.view',compact('projets','status'));    }

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
      /*  $events = [];
        $datas = Projet::with('chefs')->with('service')->with('client')->where('etat','validée')->get();
        foreach ($datas as $data){

        $events[] = \Calendar::event(
            $data->titre, //event title
            false, //full day event?
            $data->start_date, //start time (you can also use Carbon instead of DateTime)
            $data->end_date, //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

       }        $projets =Projet::with('chefs')->with('service')->with('client')->where('etat','validée')->get() ;

        $calendar =Calendar::addEvents($events);*/
        $events = [];
        //$datas = Projet::where('etat_id','3')->with('service')->get();
        $etat=3;
        $datas =Proposition::with('projet')->whereHas('projet', function ($query) {
            $query->where('etat_id', '=',3);
        })->get();
  //return $datas;
        foreach ($datas as $data) {
            $events[] = \Calendar::event(
                $data->projet->objet,
                true, //full day event?
                $data->start_date, //start time (you can also use Carbon instead of DateTime)
                $data->start_date, //end time (you can also use Carbon instead of DateTime)
                0,
                [
                    'color' => '#f05050',
                    'url' => 'propostion/'.$data->id,
                ]
            );

        }


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
       // $admins=admin::where('role','0')->get();
        $projet = Projet::where('id',$id)->with('user')->first();
        //$materiels=Materiel::all();
        return view ('admin.projet.update',compact('projet'));
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
            'objet' => 'required',
            'description' => 'required',

        ]);

        // return $request;\Carbon\Carbon::parse($user->created_at)->format('d/m/Y');
         $date1=\Carbon\Carbon::parse($request->date_fin)->format('Y-m-d');
        $date=\Carbon\Carbon::parse($request->date_debut)->format('Y-m-d');
        $projet = Projet::find($id);
        $projet->objet= $request->objet;
        $projet->description= $request->description;
        $projet->etat_id=2;
      //  $projet->start_date=$etat;
        ///$projet->start_date=$date;
      //  $projet->end_date=$date1;
    //    $projet->admin_id= $request->equipe;
        $projet->update();

      /*  $admin=admin::find($projet->admin_id);
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder($request->title);
        $notificationBuilder->setBody($request->description)
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $token=$admin->device_token;

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $a= $downstreamResponse->numberSuccess();
        $b=$downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();*/
        //$projet->materiels()->sync($request->materiels);


//       return "$b";

        return redirect()->route('projet.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        projet::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
