<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditprofileController extends Controller
{

    // User data Retrieve .
    public function index()
    {
        $id = Auth::user()->id;
        $userData = User::where('id', $id)->first();
        return view('editprofile', compact('userData'));
    }


    // Update user data .
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'email' => 'required',
            'country' => 'required'
        ]);

        if (!empty($request)) {
            $userData = User::where('id', $id)->first();
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->country = $request->country;
            if ($userData->save()) {
                return redirect()->back()->with('success', 'Profile saved Successfully!');
            } else {
                return redirect()->back()->with('error', 'Profile Not Saved!');
            }
        }
    }

    // Update user profile image
    public function imagestore(Request $request)
    {

        $id = Auth::user()->id;
        $filename = '';
        if ($request->file('profileImage')) {
            $file = $request->file('profileImage');
            $filename = $id . "-" . $file->getClientOriginalName();

            $file->move(public_path('images'), $filename);
            if ($request->oldProfile != '' || $request->oldProfile != null) {
                if (file_exists(public_path('images/' . $request->oldProfile))) {
                    unlink(public_path('images/' . $request->oldProfile));
                }
            }
            $userData = User::where('id', $id)->first();
            $userData->profileImage = $filename;
            if ($userData->save()) {
                return redirect()->back()->with('success', 'Profile Image saved Successfully!');
            } else {
                return redirect()->back()->with('error', 'Profile Image Not Saved!');
            }
        }
    }



    // Change user password
    public function changepassword(Request $request)
    {
        // $request->validate([
        //     'password' => 'required',
        //     'newPassword' => 'required',
        //     'ConfirmPassword' => 'required'
        // ]);

        $id = Auth::user()->id;
        $userData = User::where('id', $id)->first();
        if (Hash::check($request->oldPassword, $userData->password)) {
            if ($request->newPassword == $request->ConfirmPassword) {
                $userData->password = Hash::make($request->newPassword);
                if ($userData->save()) {
                    return redirect()->back()->with('success', 'Password Updated Successfully!');
                } else {
                    return redirect()->back()->with('error', 'Password Not Updated!');
                }
            } else {
                return redirect()->back()->with('error', 'Confirm password does not match.');
            }
        } else {
            return redirect()->back()->with('error', 'Old Password Does not match.');
        }
    }
}
