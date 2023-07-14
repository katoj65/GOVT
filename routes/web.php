<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Services\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return Inertia::render('Welcome', [
'canLogin' => Route::has('login'),
'canRegister' => Route::has('register'),
'laravelVersion' => Application::VERSION,
'phpVersion' => PHP_VERSION,
]);
});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


Route::middleware('guest')->get('/login',[AuthenticationController::class,'login'])->name('login');
Route::get('/',[AuthenticationController::class,'index'])->name('index');
Route::get('/about',[AuthenticationController::class,'about'])->name('about');
Route::get('/services',[AuthenticationController::class,'services'])->name('services');
Route::get('/news',[AuthenticationController::class,'news'])->name('news');
Route::get('/contact',[AuthenticationController::class,'contact'])->name('contact');
Route::get('/call-center',[AuthenticationController::class,'callCenter'])->name('call-center');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[AuthenticationController::class,'dashboard'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/report/create',[ReportController::class,'report_form'])->name('report.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/report/store',[ReportController::class,'store'])->name('report.store');

Route::middleware(['auth:sanctum', 'verified'])->post('/report/store_service_delivery',[ReportController::class,'store_service_delivery'])->name('report.store_service_delivery');
Route::middleware(['auth:sanctum', 'verified'])->get('/appointment/create',[AppointmentController::class,'create_appointment'])->name('appointment.create');

Route::middleware(['auth:sanctum', 'verified'])->post('/appointment/store',[AppointmentController::class,'store'])->name('appointment.store');
Route::middleware(['auth:sanctum', 'verified'])->post('/event/register',[AppointmentController::class,'event_appointment'])->name('event.register');
Route::get('/services',[ServicesController::class,'index'])->name('services');

