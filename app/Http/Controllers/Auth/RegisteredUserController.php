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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'email' => 'required|email|unique:users,email,'.$user->id,
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required'],
            'country' => ['required'],
            'terms' => ['required'],
            
            
        ]);
       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'terms' => $request->terms,
        ]);

        event(new Registered($user));

      // Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success','You are Registered Successfully!');
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
