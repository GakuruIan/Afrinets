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
            'Rooms'=>DB::table('hotel')
            ->select('*')
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
    //render UpdateForm
    public function updateForm(Hotel $id){
        return view('update',['info'=>$id]);
    }
    //render Reset Page
    public function renderAccount(Company $id){
        return view('Reset',['Info'=>$id]);
    }

    //logout function
    public function logout(Request $request){
          auth()->logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();
          return redirect('/')->with('message',"You have been logged out");
    }

    //search function
    public function search(Request $request){
       $search=$request['search'];
       $rooms=DB::table('hotel')
       ->select("*")
       ->where('hotel.name' ,'like','%'.$search .'%')
        ->get();
        if(count($rooms)>0)
           return view('index',['Rooms'=>$rooms]);
        else
            return redirect('/')->with('message',"No record of your search");    
    }

    //login user
    public function Login(Request $request){
        $formFields=$request->validate([
            'hotelEmail'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','Login successfull');
        }
        return  back()->withErrors(['hotelEmail'=>'Invalid Credentials'])->onlyInput('hotelEmail');
    }

    //storing hotel Credentails
    public function storeHotel(Request $request){
    $formFields=$request->validate([
        'hotelEmail'=>['required','email',Rule::unique('companies','hotelEmail')],
        'password'=>'required|confirmed|min:8'
    ]);
    $formFields['password']=bcrypt($formFields['password']);

    $company=Company::create($formFields);
    //auth
    auth()->login($company);

    return redirect('/')->with('message','Account created successfully!!!');
    }

    //Adding Room
   public function storeRoom(Request $request){
    // dd($request);
    $formFields=$request->validate([
    'hotelID'=>'required',
    'name'=>['required',Rule::unique('hotel','name')],
    'location'=>'required',
    'rating'=>'required',
    'amenities'=>'required',
    'pricing'=>'required'
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
     $customer=Customer::create($formFields);
     if($customer->exists){
         return redirect('/')->with('message','Your Room has been Reserved');
     }else{
        return back()->with('message','An error occurred');
     }
   }
   
   //update
   public function update(Request $request,Hotel $hotel){
    //Ensuring logged in user is the owner
     if($hotel->hotelID != auth()->id()){
             abort(403,"Unauthorized");
     }

    $formFields=$request->validate([
        'ID'=>'required',
        'location'=>'required',
        'rating'=>'required',
        'amenities'=>'required',
        'pricing'=>'required'
       ]);
       if($request->hasFile('snap')){
          
       }
       $formFields['snap']=$request->file('snap')->store('snaps','public');
       $hotel->update($formFields);
    
       return back()->with('message','Room Updated Successfully');
   }

   //Reset function
    public function reset(Request $request,Company $company){
        //Ensuring logged in user is the owner
     if($company->hotelID != auth()->id()){
        abort(403,"Unauthorized");
        }
        $formFields=$request->validate([
            'hotelEmail'=>['required','email'],
            'password'=>'required|confirmed|min:8'
        ]);
        $formFields['password']=bcrypt($formFields['password']);
    
        $company->update($formFields);
        
        return back()->with('message','Account Updated successfully!!!');
    }

   //delete function
   public function delete(Hotel $hotel){
     //Ensuring logged in user is the owner
     if($hotel->hotelID != auth()->id()){
        abort(403,"Unauthorized");
      }
     $hotel->delete();
     return back()->with('message','Room Deleted Successfully');
   }
}
