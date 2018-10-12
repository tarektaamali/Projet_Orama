<?php

namespace App\Http\Controllers\Api;

use App\Model\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

        use JWTAuth;
        use JWTAuthException;

class DFeedbackController extends Controller
{
    public function __construct()
        {
            $this->middleware(
                'jwt.auth',
                ['except' => ['index']]
            );
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $id1=$request['id'];
        $feedbacks =Feedback::where('realisateur_id',$id1)->orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List of all Feedback',
            'Feedbacks' => $feedbacks
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
        $user = JWTAuth::toUser($request['token']);
        $note = $request->input('note');
        $avis = $request->input('avis');
        $realisateur_id = $request->input('realisateur_id');
        $user_id = $user->id;
        $feedback = new Feedback() ;
        $feedback->note= $note;
        $feedback->avis= $avis;
        $feedback->realisateur_id= $realisateur_id;
        $feedback->user_id= $user_id;

        if ($feedback->save()) {

            $response = [
                'message' => 'feedack created',
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
