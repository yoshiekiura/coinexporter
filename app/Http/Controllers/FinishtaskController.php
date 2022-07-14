<?php

namespace App\Http\Controllers;

use App\Models\JobSpace;
use App\Models\JobDone;
use App\Models\CampaignCategory;
use App\Models\SocialPlatform;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinishtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename= 'Finish Task';
    $userID = Auth::user()->id;
		$job_dones = JobDone::select(

                            "job_dones.proof_of_work as pof", "job_dones.campaign_id","job_dones.id as jobdoneId",

                            "job_dones.status as tvl_status",

                            "job_dones.created_at as created",
							
							"job_spaces.campaign_name","job_spaces.campaign_earning",
							
							"campaign_categories.*"

                        )

                        ->join("job_spaces", "job_spaces.id", "=", "job_dones.campaign_id")
						
						->join("campaign_categories", "job_spaces.campaign_category_id", "=", "campaign_categories.id")
						
                        ->where("job_dones.user_id","=", $userID)

						->orderBy("job_dones.id","desc")                        

                        ->get();

                        //echo json_encode($job_dones);
                        //exit;
//echo $job_dones->jobdoneId;exit;
        return view('finishtask',compact('job_dones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //dd($request->all());
        //echo json_encode($request);

        if(empty($request->proofInstructionbox)){
            $proof_of_work = '';
        }
        else{
            $proof_of_work = $request->proofInstructionbox;
        }
       
            $request->validate([
                'proofInstructionbox'=>'required'
            ]);
     
     
            // $student = JobDone::find($id);
            // $student->proof_of_work = $request->get('proofInstructionbox');
            // $student->update();
     
            // return redirect('/finishtask')->with('success', 'Uploaded Successfully!');
       
        $objJobdone = JobDone::where('id', $request->finishtask_id)->first();
        $objJobdone->proof_of_work = $request->proofInstructionbox;
        $objJobdone->save();
    // //     $UpdateDetails = JobDone::where('id', $req->finishtask_id)
    // //    ->update([
    // //        'proof_of_work' => $proof_of_work
    // //     ]);
       
    if ( $objJobdone->save()) {
        return redirect()->back()->with('success', 'Uploaded Successfully!');
        
    } else {
        return redirect()->back()->with('error', 'Upload Failed!');
        
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
