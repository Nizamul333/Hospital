<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;



class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){
$doctor=new Doctor();
$image=$request->file;
$imagename=time().'.'.$image->getClientoriginalExtension();
$request->file->move('doctorimage',$imagename);
$doctor->image=$imagename;
    
$doctor->name=$request->name;
$doctor->phone=$request->number;
$doctor->specialty=$request->specialty;
$doctor->room=$request->room;
$doctor->save();
return redirect()->back()->with('message','doctor added successfully');
    }

    public function showappointment(){
        $appoint=Appointment::all();
        return view('admin.showappointment',compact('appoint'));
    }

    
    public function approvedAppoint($id){
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();

    }
    public function canceledAppoint($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();

    }
    public function showdoctor(){
        $data=Doctor::all();
   return view('admin.showdoctor',compact('data'));
    }

    public function doctorDelete($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function doctorUpdate($id){
        $data=Doctor::find($id);
    return view('admin.update_doctor',compact('data'));
    }
public function editdoctor(Request $request, $id){
    $doctor=Doctor::find($id);
    $doctor->name=$request->name;
    $doctor->phone=$request->phone;
    $doctor->specialty=$request->specialty;
    $doctor->room=$request->room;
    $image=$request->file;
    if($image){
$imagename=time().'.'.$image->getClientoriginalExtension();
$request->file->move('doctorimage',$imagename);
$doctor->image=$imagename;
    }
    $doctor->save();
    return redirect()->back()->with('message','doctor update successfully');
}
public function emailview($id){
    $data=Appointment::find($id);
    return view('admin.email_view',compact('data'));
}
public function sendemail(Request $request, $id){
$data=Appointment::find($id);
$details=[
    'greeting'=>$request->greeting,
    'body'=>$request->body,
    'actiontext'=>$request->actiontext,
    'actionurl'=>$request->actionurl,
    'endpart'=>$request->endpart,
    

];
Notification::send($data,new SendEmailNotification($details));
return redirect()->back();
}

}
