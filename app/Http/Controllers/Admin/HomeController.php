<?php
namespace App\Http\Controllers\Admin;
use App\Model\Projet;
use App\Model\Rapport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Reservation;
use Illuminate\Support\Facades\Hash;
use App\Model\admin\admin;
use Illuminate\Support\Facades\Auth;
use App\Model\Feedback;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $number= User::all()->count();
        $reservations =Projet::where('etat_id','1')->count();
         $feedback=Feedback::all()->count();
        $rapports=Rapport::all()->count();
        return view ('admin.home',compact('number','reservations','feedback','rapports'));
    }
    public function showChangePasswordForm(){
        return view('admin.auth.changepassword');
    }
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->route('admin.home')->with("success","Password changed successfully !");
    }
}