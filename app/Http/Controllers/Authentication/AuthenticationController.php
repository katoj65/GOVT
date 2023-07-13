<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GovernmentProgramsModel;
use App\Models\ServicesModel;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsModel;
use App\Models\UsefulLinksModel;
use App\Models\ProjectsModel;

class AuthenticationController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */





public function index()
{
//
$data['title']='Welcome';
$data['response']=AuthenticationController::unAuth();

return Inertia::render('Welcome',$data);
}


//
static function unAuth(){
return [
'programs'=>GovernmentProgramsModel::get(),
'news'=>NewsModel::get(),
'government'=>UsefulLinksModel::where('category','government')->get(),
'business'=>UsefulLinksModel::where('category','business')->get(),
'social'=>UsefulLinksModel::where('category','social')->get(),
'projects'=>ProjectsModel::get(),

];
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


//login

public function login(Request $request){
$data['title']='Login';
return Inertia::render('LoginPage',$data);
}



public function about(Request $request){
$data['title']='About Us';
return Inertia::render('AboutPage',$data);
}


public function contact(Request $request){
$data['title']='Contact Us';
return Inertia::render('ContactPage',$data);
}


public function services(Request $request){
$data['title']='Government Services';
$data['response']=[
'services'=>ServicesModel::orderby('name','ASC')->get(),


];
return Inertia::render('ServicePage',$data);
}


public function news(Request $request){
$data['title']='News';
return Inertia::render('NewsPage',$data);
}

public function callCenter(Request $request){
$data['title']='Call Center';
return Inertia::render('CallCenterPage',$data);
}


public function register(Request $request){
$data['title']='Register';
return Inertia::render('RegisterPage',$data);
}


public function dashboard(Request $request){
$data['title']='Dashboard';
return Inertia::render('Dashboard',$data);
}




}
