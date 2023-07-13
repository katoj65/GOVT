<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
/**
 * The root template that's loaded on the first page visit.
 *
 * @see https://inertiajs.com/server-side-setup#root-template
 * @var string
 */
protected $rootView = 'app';

/**
 * Determines the current asset version.
 *
 * @see https://inertiajs.com/asset-versioning
 * @param  \Illuminate\Http\Request  $request
 * @return string|null
 */
public function version(Request $request): ?string
{
return parent::version($request);
}

/**
 * Defines the props that are shared by default.
 *
 * @see https://inertiajs.com/shared-data
 * @param  \Illuminate\Http\Request  $request
 * @return array
 */
public function share(Request $request): array
{
return array_merge(parent::share($request), [
//

//system details
'system'=>function() use($request){
return[
'name'=>'Citizens Engagement and Reporting System',
'url'=>'http://localhost/govt/',
'auth'=>Auth::user(),

];
},



//flash data
'flash'=>[
    'success'=>fn()=>$request->session()->get('success'),
    'warning'=>fn()=>$request->session()->get('warning'),
    'error'=>fn()=>$request->session()->get('error'),
    'notice'=>fn()=>$request->session()->get('notice'),


    ],




]);
}
}
