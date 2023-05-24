<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use PhpParser\Builder\Function_;

class HomeController extends Controller
{

    public function index(){
if(Auth::id()){
    return redirect('home');
}

        else{
        $doctor=Doctor::all();
        return view('user.home' ,compact('doctor'));}
    }
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }
public function appointment(Request $request){
$appointment=new Appointment();
$appointment->name=$request->name;
$appointment->email=$request->email;
$appointment->phone=$request->number;
$appointment->doctor=$request->doctor;
$appointment->date=$request->date;
$appointment->message=$request->message;
$appointment->status='in progress';
if(Auth::id()){
$appointment->user_id=Auth::user()->id;}
$appointment->save();
return redirect()->back()->with('message','appoinment has been booked later let you be known');

}
public function myappointment(){
    if(Auth::id()){
        $userid=Auth::user()->id;
        $appoint=appointment::where('user_id', $userid)->get();
    return view('user.my_appointment',compact('appoint'));}
    else{
        return redirect()->back();
    }
}
public Function cancelAppoint($id){
    $data=appointment::find($id);
    $data->delete();
    return redirect()->back();
}
    
}

