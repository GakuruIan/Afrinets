<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    //List all the hotels
    public function index(){
        return view('index',[
            'Rooms'=>DB::table('hotel')->join('companies','hotel.companyID' ,'=', 'companies.companyID')
             ->get()
       ]);
    }


    //render login page
    public function renderLogin(){
        return view('Login');
    }

    //render signup
    public function renderSignup(){
        return view('signup');
    }
    //render addroom form
    public function renderRoom(){
        return view('hotel');
    }

    public function renderDash(){
        return view('dash',['Info'=>DB::table('customers')->join('companies','customers.hotelID','companies.companyID')
        ->get()
    ]);
    }

    public function logout(Request $request){
          auth()->logout();

          $request->session()->invalidate();
          $request->session()->regenerateToken();

          return redirect('/')->with('message',"You have been logged out");
    }

    //login user
    public function Login(Request $request){
        $formFields=$request->validate([
            'companyEmail'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','Login successfull');
        }
        return  back()->withErrors(['companyEmail'=>'Invalid Credentials'])->onlyInput('companyEmail');
    }
    //storing company
    public function storeCompany(Request $request){
    $formFields=$request->validate([
        'company_name'=>'required',
        'companyEmail'=>['required','email',Rule::unique('companies','companyEmail')],
        'location'=>'required',
        'password'=>'required|confirmed|min:8'
    ]);
    $formFields['password']=bcrypt($formFields['password']);

    $company=Company::create($formFields);
    //auth
    auth()->login($company);

    return redirect('/login')->with('message','Account created successfully!!!');
    }

    //Adding Room
   public function storeRoom(Request $request){
    $formFields=$request->validate([
    'companyID'=>'required',
    'location'=>'required',
    'rating'=>'required',
    'amenities'=>'required',
    'pricing'=>'required',
    'roomDetails'=>'required'
   ]);
   $formFields['snap']=$request->file('snap')->store('snaps','public');
   Hotel::create($formFields);

   return redirect('/')->with('message','Room Added Successfully');
   }

   //Booking 
   public function book(Request $request){
    // dd($request);
     $formFields=$request->validate([
        'hotelID'=>'required',
        'name'=>'required',
        'email'=>['required','email',Rule::unique('customers','email')],
        'nationalID'=>'required',
         'checkout'=>'required',
        'checkin'=>'required'
     ]);
     Customer::create($formFields);
     return redirect('/')->with('message','Your Room has been Reserved');
   }
}
