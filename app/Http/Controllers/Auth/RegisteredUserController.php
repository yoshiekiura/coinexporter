<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,User $user)
    {
        //dd($request->all());
       

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',   // required and email format validation
             // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'password' => 'required|min:8', 
            
            // required and number field validation
           // 'confirm_password' => 'confirmed|min:8',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'country'=> 'required',
            'terms'=> 'required',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(),422);  
            // validation failed return back to form

        } else {
        if(!empty($request->referral_code)){
            $ref_code = $request->referral_code;
            }else{
                $ref_code ='NULL';
            }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'referral_code' => $ref_code,
            'terms' => $request->terms,
        ]);
       
        event(new Registered($user));
      // Auth::login($user);

        //return redirect(RouteServiceProvider::HOME)->with('success','You are Registered Successfully!');
        if($user){
            $request->session()->flash('success', 'You are Registered Successfully!');
            return response()->json(["status"=>true,"redirect_location"=>url("/")]);
        } else {
            return response()->json(["Something Wrong!"],422);
            //return response()->json($validator->errors(),422); 
        }
      }
    }
    // public function checkDuplicateEmail(Request $request){
    //     if($request->ajax()){
    //         $adminEmail = $request->email;
    //         $emailCount = Users::where('email', $adminEmail)->count();
    //         if($emailCount>0){
    //             echo "false";
    //         } else {
    //             echo "true";
    //         }
    //     }
    // }
}
