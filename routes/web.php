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
})->middleware('guest');

Route::get('/view/{id}',function($id){
   return view('view',['room'=> DB::table('hotel')
   ->select('hotel.*')
   ->where('hotel.ID' ,'=' ,$id)
   ->get()]);

})->middleware('guest');
Route::get('/login', [ListingController::class,'renderLogin'])->name('login')->middleware('guest');

Route::get('/signup',[ListingController::class,'renderSignup'])->middleware('guest');

Route::get('/createRoom',[ListingController::class,'renderRoom'])->middleware('auth');

Route::get('/dashboard/Account/{id}',[ListingController::class,'renderAccount'])->middleware('auth');

Route::get('/logout',[ListingController::class,'logout'])->middleware('auth');

Route::get('/dashboard/{id}',function($id){
    return view('booktable',['Info'=>auth()->user()->customer()->get()]);
})->middleware('auth');

Route::get('/dashboard/rooms/{id}',function($id){
        return view('roomstable',['Info'=>auth()->user()->hotel()->get()]);
})->middleware('auth');

Route::get('/edit/{id}',[ListingController::class,'updateForm'])->middleware('auth');
Route::get('/search',[ListingController::class,'search'])->middleware('guest');

Route::post('/booking',[ListingController::class,'book'])->middleware('guest');
Route::post('/register',[ListingController::class,'storeHotel'])->middleware('guest');
Route::post('/createRoom',[ListingController::class,'storeRoom'])->middleware('auth');
Route::post('/login/auth',[ListingController::class,'Login'])->middleware('guest');

Route::put('/update/{hotel}',[ListingController::class,'update'])->middleware('auth');
Route::put('/reset/{company}',[ListingController::class,'reset'])->middleware('auth');

Route::delete('/delete/{hotel}',[ListingController::class,'delete'])->middleware('auth');

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