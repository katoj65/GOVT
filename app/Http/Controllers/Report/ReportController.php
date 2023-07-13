<?php

namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CrimeCategoryModel;
use App\Models\PoliceRegionModel;
use App\Models\PoliceDivisionModel;
use App\Models\UserReportModel;
use Illuminate\Support\Facades\Auth;
use App\Models\GovernmentServicesModel;
use App\Models\GovernmentServicesIssueModel;
use App\Models\UserREportPublicServiceModel;


class ReportController extends Controller
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
'crime'=>['required'],
'station'=>['required'],
'region'=>['required'],
'telephone'=>['required']
]);

UserReportModel::insert([
'userID'=>Auth::user()->id,
'telephone'=>$request->telephone,
'regionID'=>$request->region,
'description'=>$request->description,
'stationID'=>$request->station,
'crimeID'=>$request->crime
]);
return redirect('/report/create')->with('success','You have successfull reported a crime.');
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


//police formation
function police_formation(){
$data=[];
$get=PoliceRegionModel::select('id','name')->get();
if(count($get)>0){
foreach($get as $row){
$data[]=[
'id'=>$row->id,
'name'=>$row->name,
'division'=>PoliceDivisionModel::select('id','name','police_regionID')->where('police_regionID',$row->id)->get()
];
}
}
return $data;
}




//report form
public function report_form(Request $request){
$data['title']='Report Incident';
$data['response']=[
'crimes'=>CrimeCategoryModel::get(),
'region'=>PoliceRegionModel::select('id','name')->get(),
'division'=>PoliceDivisionModel::select('id','name','police_regionID')->get(),
'services'=>GovernmentServicesModel::get(),
'issue'=>GovernmentServicesIssueModel::get()

];

return Inertia::render('ReportForm',$data);

}


//report service delivery
public function store_service_delivery(Request $request){
$request->validate([
'issue'=>['required'],
'service'=>['required'],
'telephone'=>['required']
]);
UserREportPublicServiceModel::insert([
'userID'=>Auth::user()->id,
'serviceID'=>$request->service,
'issueID'=>$request->issue,
'telephone'=>$request->telephone
]);

return redirect('/report/create')->with('success','You have successfull reported.');

}



















}
