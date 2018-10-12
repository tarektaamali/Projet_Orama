<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Demandeur;

class DloginController extends Controller
{
    public function userStore(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'nom'=>'required',
            'prenom'=>'required',
            'nom_societe'=>'required',
            'phone'=>'required',
            'lieu' =>'required',

        ]);
      
    
        $email = $request->input('email');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $nom_societe = $request->input('nom_societe');
        $lieu = $request->input('lieu');
        $phone = $request->input('phone');
        $password = $request->input('password');  
       
        $user = new Demandeur();
        $user->email= $email;
        $user->nom= $nom;
        $user->prenom= $prenom;
        $user->adresse= $lieu;
        $user->phone= $phone;
        $user->password= $password;
        if ($user->save()) {
         
           $response = [
                'message' => 'User created',
                'user' => $user,
            ];
            return response()->json($response, 201);
        }
            
        $response = [
            'message' => 'An error occurred'
        ];
        return response()->json($response, 404);
   
    }
    public function userLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $email=$request->email;
        $password=$request->password;
        $user = Demandeur::where('email', $email)->first();
        if ($user != null){
                 if($user->password==$password){
                 return $response = [
                        'message' => 'User signin',
                        'user' => $user
                    ];
                 }
                 return response()->json([
                    'message' => 'Email or Password are incorrect',
                ], 404);


        }
        $response = [
            'message' => 'An error occurred'
        ];
        return response()->json($response, 404);
   
    }
}
