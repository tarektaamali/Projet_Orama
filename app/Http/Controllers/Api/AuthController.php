<?php

namespace App\Http\Controllers\Api;
use App\User;
use App\Model\Admin;
use App\Model\Feedback;
use App\Model\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use JWTAuth;
use JWTAuthException;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'jwt.auth',
            ['except' => ['store', 'signin']]
        );
    }
    public function store(Request $request)
    {
        Config::set('jwt.user', 'App\User');
        Config::set('auth.providers.users.model', \App\User::class);
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $nom = $request->input('nom');
        $prenom= $request->input('prenom');
        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');
        $telephone = $request->input('telephone');
        $societe = $request->input('societe');
        $adresse = $request->input('adresse');


        $user = new User() ;
        $user->prenom=$prenom;
            $user->nom= $nom;
            $user->role=$role;
            $user->email = $email;
        $user->email = $email;
        $user->societe=$societe;
        $user->adresse=$adresse;

        $user->telephone=$telephone;
        $user->password =bcrypt($password);



        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        if ($user->save()) {
            $token = null;
            try {
                Config::set('auth.providers.users.model', User::class);

                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'message' => 'Email or Password are incorrect',
                    ], 404);
                }
            } catch (JWTAuthException $e) {
                return response()->json([
                    'message' => 'failed_to_create_token',
                ],404);
            }
            $user->signin = [
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ];
            $response = [
                'message' => 'User created',
                'user' => $user,
                'token' => $token
            ];
            return response()->json($response, 201);
        }
        $response = [
            'message' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }
    public function signin(Request $request)
    {  


        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $device_token=$request->input('device_token');

        if ($user = User::where('email', $email)->first()){
            $credentials = [
                'email' => $email,
                'password' => $password,
                'status'=>1
            ];
            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'message' => 'Email or Password are incorrect',
                    ], 404);
                }
            } catch (JWTAuthException $e) {
                return response()->json([
                    'message' => 'failed_to_create_token',
                ],404);
            }
            $response = [
                'message' => 'User signin',
                'user' => $user,
                'token' => $token
            ];
           if(!$device_token==""){
             $user->device_token=$device_token;
             $user->save();}
            return response()->json($response, 201);
        }
        $response = [
            'message' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
           return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }

    }


    public function verifyToken(Request $request){

        $this->validate($request,['token'=>'required']);
        $user = JWTAuth::toUser($request['token']);
        return response()->json(['success' => true, 'message'=> $user->email]);    }

    public function getUser(Request $request){
        $this->validate($request,['token'=>'required']);
        $user = JWTAuth::toUser($request['token']);
        return response()->json($user);    }
          /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    { $id=$request['id'];
            $user = User::find($id)->first();
            $value=
          $star = Feedback::where('realisateur_id',$id)->avg('avis');
            $user->star=$star;
            $count=Projet::where('realisateur_id',$id)->where('etat_id',4)->count();
            $user->count= $count;
        $response = [
            'message' => 'user',
            'user' => $user
        ];
        return response()->json($user,200);  
       }


}
