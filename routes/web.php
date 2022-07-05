<?php

use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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


Route::get('/', [ListingController::class,'index']);

Route::get('/booking/{id}', function(Hotel $id){
   return view('booking',['id'=> $id->hotelID]);
});

Route::get('/view/{id}',function($id){
   return view('view',['room'=> DB::table('hotel')->join('companies','hotel.companyID','=','companies.companyID')
   ->select('hotel.*','companies.company_name')
   ->where('hotel.hotelID' ,'=' ,$id)
   ->get()]);

});
Route::get('/login', [ListingController::class,'renderLogin']);

Route::get('/signup',[ListingController::class,'renderSignup']);

Route::get('/createRoom',[ListingController::class,'renderRoom']);

Route::get('/logout',[ListingController::class,'logout']);

Route::get('/dashboard',[ListingController::class,'renderDash']);


Route::post('/booking',[ListingController::class,'book']);
Route::post('/register',[ListingController::class,'storeCompany']);
Route::post('/createRoom',[ListingController::class,'storeRoom']);
Route::post('/login/auth',[ListingController::class,'Login']);

// Route::get('/profile', function () {
//    return response('<h1>profile page</h1>',200)
//    ->header('Content-Type','text/plain')
//    ->header('foo','bar');
// });

// Route::get('/user/{id}', function ($id) {
//     return response('user id '.$id);
// })->where('id','[0-9]+');

// Route::get('/search', function (Request $request) {
//     // dd($request);
//     return 'name '.$request->name;
// });