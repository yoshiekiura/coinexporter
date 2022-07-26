<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\JobDone;
use App\Models\JobLog;
use App\Models\JobSpace;
use App\Models\SocialPlatform;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobdetailController extends Controller
{
    // Retrieve all data from jobspace
    public function index($id)
    {
        $userID = Auth::user()->id;
        $jobSpaceData = JobSpace::select("job_spaces.*")->where('job_spaces.id', $id)->join("social_platform", "social_platform.id", "=", "job_spaces.campaign_subcategory_id")->join("job_payment_check", "job_payment_check.campaign_id", "=", "job_spaces.id")->first();
  
        $jobSpace = JobSpace::where('id', '=',  $id)->where('user_id', '=', $userID)->first();
        return view('jobdetail', compact('jobSpaceData','jobSpace'));
        // return view('jobdetail');
    }

    //store  data in jobdone
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        // $jobdone = JobDone::where('id', '=', $request->campainId)->where('user_id', '=', $userID)->first();
        // dd($userID);
  ;
  if (JobDone::where('campaign_id', '=', $request->campainId)->where('user_id', '=', $userID)->count() > 0) {
        return redirect()->route('dashboard')->with('error', 'You Have Already Done this task!');
    }else{
            $dataJobDone = new JobDone;
            $dataJobDone->campaign_id = $request->campainId;
            $dataJobDone->user_id = $userID;
            $dataJobDone->campaign_earnings = $request->campainEarning;
            if($request->reason == ''){
                $dataJobDone->why_not_reason = ' ';
            }else{
                $dataJobDone->why_not_reason = $request->reason;
            }
    
            $dataJobDone->proof_of_work = '';
            $dataJobDone->earning_status = '';
        
            $dataJobDone->status = 'Pending';
            $dataJobDone->save();

            //dd($dataJobDone);

                if ($dataJobDone->save()) {
                
                        return redirect()->route('finishtask')->with('success', 'Job Jone Successfully!');
                        } else {
                            return redirect()->back()->with('error', 'Job Done Cancelled!');
                    }
        
         }
    }
       
}
