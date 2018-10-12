<?php

namespace App\Http\Controllers\User;

use App\Model\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function create()
    {
        return view ('user\feedback');

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

            'name' => 'required',
            'message' => 'required',
        ]);
        $request->user();
        $feedback = new Feedback();
        $feedback->sujet= $request->name;
        $feedback->message= $request->message;
        $feedback->user_id= $request->user()->id;
        $feedback->save();

        return redirect()->route('home');

    }
}
