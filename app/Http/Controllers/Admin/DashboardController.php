<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\JobSpace;
use App\Models\JobDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected string $guard = 'admin';
    public function guard() 
    {
        return Auth::guard($this->guard);
    }
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $user = Admin::get();

         //TOTAL USERS
         $emp_user = User::where('status','active')->count('id');

         //TOTAL CAMPAIGN
         $campaign = JobSpace::where('status','Approved')->count('id');

         //TOTAL JOB DONE
         $jobdone = JobDone::where('status','Approved')->count('id');
        
         //TOTAL PENDING CAMPAIGN
         $pending_campaign = JobSpace::where('status','Pending')->count('id');
         
        return view('admin.dashboard',compact('user','emp_user','campaign','jobdone','pending_campaign'));
    }

    
       
   
}
 