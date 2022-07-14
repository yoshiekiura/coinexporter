<?php

namespace App\Http\Controllers;


use App\Models\JobSpace;
use App\Models\JobDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator; 

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Start with creating your object, which will be used to query the database

        // $job_spaces = JobSpace::select("job_spaces.*","job_spaces.status as sts")
        // ->orderby("job_spaces.colors","desc");


        // //Add Conditions

        // if(!is_null($request->jobname)) {
        //     $job_spaces->where('campaign_name','=',$request->jobname);
        // }

        // if(!is_null($request->payment)) {
        //     $job_spaces->where('campaign_earning','=',$request->payment);
           
        // }

        // //Fetch list of results

        // $result = $job_spaces->paginate(2);

           // echo $jobname;
        $job_spaces = JobSpace::select("job_spaces.*","job_spaces.status as sts")
                            ->orderby("job_spaces.colors","desc")
                            ->paginate(2);

                            

        // $explode_country = explode(',' ,$job_spaces->country) ;
        // $check = array_search(Auth::user()->country, $explode_country);
         $userId = Auth::user()->id;
       // $data = JobDone::select("proof_of_work as pof")->where("campaign_id",$job_spaces->id)->where("user_id",$userId)->count();
       
       $data = '';
      
       if ($request->ajax()) {
        foreach ($job_spaces as $job_space) {
            $action = route('jobdetail', ['id' => $job_space->id]);
            $explode_country = explode(',' ,$job_space->country) ;
            $check = array_search(Auth::user()->country, $explode_country);
            $userId = Auth::user()->id;
            $jobdone = JobDone::select("proof_of_work as pof")->where("campaign_id",$job_space->id)->where("user_id",$userId)->count();
            if($check !== false){
            if($jobdone == $job_space->promoters_needed){

            }else{
            
            if($job_space->colors == 'LG'){
                $bg_Colr ='background-color:#C4EE98;';
            }
            else if($job_space->colors == 'L'){
                $bg_Colr ='background-color:#F9734B;';
            }
            else if($job_space->colors == 'Y'){
                $bg_Colr ='background-color:#ECF70E;';
            }
            else {
                $bg_Colr ='';
            }
            if ($job_space->sts == 'active') {
                $status = '<td style='.$bg_Colr.'><span class="rectangual-box"></span></td>';
                }else { 
                $status =  '<td style='.$bg_Colr.'}><span class="rectangual-box" style="background-color:red;"></span></td>';
            } 
            $data .='<tr><td align="left" style='.$bg_Colr.'><a href="'.$action.'">'.$job_space->campaign_name.'</a></td><td style='.$bg_Colr.'>$'.$job_space->campaign_earning.'</td>'. $status.'<td style='.$bg_Colr.'>'.$jobdone.'/<sup>'.$job_space->promoters_needed.'</sup></td></tr>';
            
             }
            }
        }
        return $data;
       
    }

       $payments = JobSpace::select("job_spaces.campaign_earning")
       ->orderby("job_spaces.campaign_earning","asc")
       ->groupby("job_spaces.campaign_earning")
       ->get(); 
    //    if (! empty(request('categorie'))) {
    //     $project->where('categorie', 'like', '%' . request('categorie') . '%');
    // }
        return view('dashboard', compact('job_spaces','payments'));
    }

   
}
