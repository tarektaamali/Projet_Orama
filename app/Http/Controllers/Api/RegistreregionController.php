<?php

namespace App\Http\Controllers\Api;

use App\Model\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use JWTAuth;
class RegistreregionController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id=$user->id;
        $user = User::findOrFail($user_id);
        $user->regions()->sync($request->region_id);
        return response()->json([
            'message' => 'failed',
        ],201);


        $this->validate($request, [
        'region_id' => 'required',
        'user_id' => 'required',
    ]);
        $region_id = $request->input('region_id');
        $user_id = $request->input('user_id');
        $region = Region::findOrFail($region_id);
        $user = User::findOrFail($user_id);
        $message = [
            'message' => 'User is already registered for meeting',
            'user' => $user,
            'service' => $region,
            'unregister' => [
                'href' => 'api/v1/meeting/registration/' . $region->id,
                'method' => 'DELETE',
            ]
        ];
        if ($region->users()->where('users.id', $user->id)->first()) {
            return response()->json($message, 404);
        };
        $user->regions()->attach($region);
        $response = [
            'message' => 'User registered for meeting',
            'meeting' => $region,
            'user' => $user,
            'unregister' => [
                'href' => 'api/v1/meeting/registration/' . $region->id,
                'method' => 'DELETE'
            ]
        ];
        return response()->json($response, 201);    }


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
    public function destroy(Request $request, $id)
    {
        $user = JWTAuth::toUser($request['token']);
        $region =Region::findOrFail($id);
        $region->users()->detach($user->id);
        $response = [
            'message' => 'User unregistered for meeting',
            'meeting' => $region,
            'user' => 'tbd',
            'register' => [
                'href' => 'api/v1/meeting/registration',
                'method' => 'POST',
                'params' => 'user_id, service_id'
            ]
        ];
        return response()->json($response, 200);
    }
}
