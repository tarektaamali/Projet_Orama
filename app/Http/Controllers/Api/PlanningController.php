<?php

namespace App\Http\Controllers\Api;

use App\Model\Projet;
use App\Model\Proposition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
//use FCM;

use Saikat\FirebaseCloudMessaging\Facades\PushNotification;
use Saikat\FirebaseCloudMessaging\PushManager;

class PlanningController extends Controller
{
    public function __construct()
    {
      //  $this->pushManager = $pushManager;
       $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = JWTAuth::toUser($request['token']);
         $etat=3 ;
        $date=$request['date'];
        $now=\Carbon\Carbon::now()->format('Y-m-d');
        //$projets =Projet::with('service')->where('realisateur_id', '=',$user->id)->with('user')->where('etat_id',3)->get() ;
        $propositions =Proposition::with('projet')->whereHas('projet', function ($query) {
            $query->where('etat_id', '=',3);
        })->where('start_date',$date)->where('user_id',$user->id)->with('projet')->get();
        $response = [
            'message' => 'planning',
            'planning' => $propositions
        ];

        return response()->json($response, 200);


        //    return view ('admin.projet.view',compact('projets'));
    }
   /* public function sendPushNotification()
    {
        $pushManager = app('PushManager'); // this will keep the PushManager instance singleton
    }
    public function send(Request $request){

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Fsociety')
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "fTXsuEUmsmY:APA91bEM7J4OEf04LtC9DoYGLENK2_DiYy8PQsjYmaAGgQBRa5gmVf78yDLkthoc_RbsC3pWDM3-W0cF05C_0WoCVk8UzxUtu99PZuwtYap4l8_Zv4sUEr_4tnGgiQHeDeUYndN05CDi";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

       $a= $downstreamResponse->numberSuccess();
        $b=$downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        return "$b";
    }*/
}
