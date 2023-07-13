<?php

namespace App\Http\Controllers\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\EventModel;
use App\Models\ServicesModel;
use App\Models\ServiceDepartmentModel;
use App\Models\AppointmentModel;
use Illuminate\Support\Facades\Auth;
use App\Models\EventRegistrationModel;

class AppointmentController extends Controller
{
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
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
//
$request->validate([
'telephone'=>['required'],
'ministry'=>['required'],
'department'=>['required'],
'reason'=>['required']
]);

AppointmentModel::insert([
'userID'=>Auth::user()->id,
'telephone'=>$request->telephone,
'ministryID'=>$request->ministry,
'departmentID'=>$request->department,
'reason'=>$request->reason
]);

return redirect('/appointment/create')->with('success','Appointment request submitted.');

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


//create appointment
public function create_appointment(Request $request){
$data['title']='Make Appointment';
$data['response']=[
'events'=>EventModel::get(),
'ministries'=>ServicesModel::get(),
'departments'=>ServiceDepartmentModel::get(),
];
return Inertia::render('AppointmentForm',$data);
}



//register for event
public function event_appointment(Request $request){
$request->validate([
'telephone'=>['required'],
'event'=>['required']
]);

$count=EventRegistrationModel::where('userID',Auth::user()->id)
->where('eventID',$request->event)
->where('status','!=','ended')
->count();

if($count==0){
EventRegistrationModel::insert([
'userID'=>Auth::user()->id,
'eventID'=>$request->event,
'telephone'=>$request->telephone
]);

return redirect('/appointment/create')->with('success','You have registered successfully.');

}else{
return redirect('/appointment/create')->with('warning','You are already registered for this event.');
}

}






}
