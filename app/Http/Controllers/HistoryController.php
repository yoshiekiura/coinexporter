<?php
 
namespace App\Http\Controllers;
use App\Models\JobDone;
use App\Models\JobSpace;
use App\Models\Transaction;
use App\Models\User;
use App\Models\JobLog;
use App\Models\ReferralEarning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $JobPaymentChecks = JobLog::select(

            "tbl_job_logs.*",

            "tbl_job_logs.created_at as created",

            "tbl_job_logs.status as tvl_status",

            "tbl_job_logs.user_id as userid",
            
            "job_spaces.*",
            
            "campaign_categories.*"

        )

        ->join("job_spaces", "job_spaces.id", "=", "tbl_job_logs.campaign_id")
        
        ->join("campaign_categories", "job_spaces.campaign_category_id", "=", "campaign_categories.id")
        
        ->orderBy("tbl_job_logs.id","desc")

        ->where('tbl_job_logs.campaign_id', $id)

        ->get();
        return view('history',compact('JobPaymentChecks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //$JobDones = JobDone::find($req->key);
        $JobDones = JobDone::where('job_dones.campaign_id', $req->campaign_id)
        ->where('job_dones.user_id', $req->user_id)
        ->first();
        if($req->status){
            
            $JobDones->status = $req->status;
            $JobDones->why_not_reason = $req->whyreject;
            
            if ($JobDones->save()) {
               
                $userID = Auth::user()->id;
                $jobLog = new JobLog;
                $jobLog->status = $req->status;
                $jobLog->campaign_id = $req->campaign_id;
                $jobLog->user_id = $req->user_id;
                $jobLog->campaign_earnings = $req->campaign_earnings;
                $jobLog->why_not_reason = $req->whyreject;

                if($req->proof_of_work){
                $jobLog->proof_of_work = $req->proof_of_work;
                }else{
                $jobLog->proof_of_work = '';
                }
                $jobLog->save();
                
                $campaignEarning = $req->campaign_earnings;

                //check referral code of camapign
                $JobRefs = JobSpace::select('referrer_code','created_at')->where('user_id',$req->user_id)->first();
                $JobcurrentDate = date('Y-m-d');
                $JobcreatedDate = date("Y-m-d", strtotime($JobRefs->created_at));

                //Calculate days from given dates of campaign referral
                $Jobdatetime1 = new DateTime($JobcurrentDate);
                $Jobdatetime2 = new DateTime($JobcreatedDate);
                $Jobinterval = $Jobdatetime1->diff($Jobdatetime2);
                $Jobdays = $Jobinterval->format('%a');

                //check referral code of registration
                $Refs = User::select('referrer_code','created_at')->where('id',$req->user_id)->first();
                $currentDate = date('Y-m-d');
                $createdDate = date("Y-m-d", strtotime($Refs->created_at));

                //Calculate days from given dates of registration referral
                $datetime1 = new DateTime($currentDate);
                $datetime2 = new DateTime($createdDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                                              
                 
                 if(($Refs->referrer_code != 'NULL') && ($JobRefs->referrer_code != 'NULL')){
                    $sel= JobSpace::select('job_spaces.user_id')->join('users','job_spaces.user_id','=','users.id')->where('job_spaces.referral_code',$JobRefs->referrer_code)->where('users.referral_code',$Refs->referrer_code)->first();
                    $ref_userid = $sel->user_id;
                    if($sel){
                    if(($days <= 30) || ($Jobdays <= 30)){
                        $campaignEarn = $campaignEarning * 3/100;
                        if($req->status == 'Approved'){

                            //User Walllet Balance
                            $Usr = User::find($req->user_id);
                            $Usr->wallet_balance += $campaignEarning;
                            $Usr->save();
                            $Usrs = User::find($ref_userid);
                            $Usrs->wallet_balance += $campaignEarn;
                            $Usrs->save();


                            $referralEarning = new ReferralEarning;
                            $referralEarning->promoter_id = $req->user_id;
                            $referralEarning->referred_user_id = $ref_userid;
                            $referralEarning->referral_earnings = $campaignEarn;
                            $referralEarning->promotion_type = 'Both Registration and Campaign';
                            $referralEarning->transaction_date = $currentDate;
                            $referralEarning->save();

                            $transactions = new Transaction;
                            $transactions->user_id = $ref_userid;
                            $transactions->status='Confirmed'; 
                            $transactions->withdraw_amount = $campaignEarn;
                            $transactions->approved_amount = $campaignEarn;
                            $transactions->description = 'Charges For Refferal Code of Both Registration and Campaign of $'.$campaignEarn .' has been Credited on '.date('d/m/Y');
                            $transactions->transaction_type = 'Credit';
                            $transactions->save();
                        }elseif($req->status == 'Rejected'){

                            //User Walllet Balance
                            $Usr = User::find($req->user_id);
                            $Usr->wallet_balance -= $campaignEarning;
                            $Usr->save();
                            $Usrs = User::find($ref_userid);
                            $Usrs->wallet_balance -= $campaignEarn;
                            $Usrs->save();

                            $transactions = new Transaction;
                            $transactions->user_id = $ref_userid;
                            $transactions->status='Cancelled'; 
                            $transactions->withdraw_amount = (-$campaignEarn);
                            $transactions->approved_amount = (-$campaignEarn);
                            $transactions->description = 'Charges For Refferal Code of Both Registration and Campaign of $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                            $transactions->transaction_type = 'Debit';
                            $transactions->save();
                            }else{}
                    }
                    }
                }
                elseif(($Refs->referrer_code != 'NULL')){
                        $Ref = User::select('id','referral_code','created_at')->where('referral_code',$Refs->referrer_code)->first();
                        $currentDate = date('Y-m-d');
                        $createdDate = date("Y-m-d", strtotime($Ref->created_at));
        
                        //Calculate days from given dates of registration referral
                        $datetime1 = new DateTime($currentDate);
                        $datetime2 = new DateTime($createdDate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                        $ref_userid = $Ref->id; 
                        if($days <= 30){
                            $campaignEarn = $campaignEarning * 1/100;
                            if($req->status == 'Approved'){

                                //User Walllet Balance
                            $Usr = User::find($req->user_id);
                            $Usr->wallet_balance += $campaignEarning;
                            $Usr->save();
                            $Usrs = User::find($ref_userid);
                            $Usrs->wallet_balance += $campaignEarn;
                            if($Usrs->save())
                           {echo $ref_userid;}else{echo "11";} 
                            //print_r($Usrs);exit;

                            $referralEarning = new ReferralEarning;
                            $referralEarning->promoter_id = $req->user_id;
                            $referralEarning->referred_user_id = $ref_userid;
                            $referralEarning->referral_earnings = $campaignEarn;
                            $referralEarning->promotion_type = 'Registration';
                            $referralEarning->transaction_date = $currentDate;
                            $referralEarning->save();
        
                            $transactions = new Transaction;
                            $transactions->user_id = $ref_userid;
                            $transactions->status='Confirmed'; 
                            $transactions->withdraw_amount = $campaignEarn;
                            $transactions->approved_amount = $campaignEarn;
                            $transactions->description = 'Charges For Refferal Code of Registration  $'.$campaignEarn .' has been Credited on '.date('d/m/Y');
                            $transactions->transaction_type = 'Credit';
                            $transactions->save();
                            }elseif($req->status == 'Rejected'){

                                //User Walllet Balance
                            $Usr = User::find($req->user_id);
                            $Usr->wallet_balance -= $campaignEarning;
                            $Usr->save();
                            $Usrs = User::find($ref_userid);
                            $Usrs->wallet_balance -= $campaignEarn;
                            $Usrs->save();

                            $transactions = new Transaction;
                            $transactions->user_id = $ref_userid;
                            $transactions->status='Cancelled'; 
                            $transactions->withdraw_amount = (-$campaignEarn);
                            $transactions->approved_amount = (-$campaignEarn);
                            $transactions->description = 'Charges For Refferal Code of Registration $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                            $transactions->transaction_type = 'Debit';
                            $transactions->save();
                            }else{}
                    }
                }
                elseif(($JobRefs->referrer_code != 'NULL')){
                    $JobRef = JobSpace::select('user_id','referral_code','created_at')->where('referral_code',$JobRefs->referrer_code)->first();
                    $JobcurrentDate = date('Y-m-d');
                    $JobcreatedDate = date("Y-m-d", strtotime($JobRef->created_at));
    
                    //Calculate days from given dates of campaign referral
                    $Jobdatetime1 = new DateTime($JobcurrentDate);
                    $Jobdatetime2 = new DateTime($JobcreatedDate);
                    $Jobinterval = $Jobdatetime1->diff($Jobdatetime2);
                    $Jobdays = $Jobinterval->format('%a');
                    $ref_userid = $JobRef->user_id;    
                    if($Jobdays <= 30){
                        $campaignEarn = $campaignEarning * 2/100;
                        if($req->status == 'Approved'){

                            //User Walllet Balance
                        $Usr = User::find($req->user_id);
                        $Usr->wallet_balance += $campaignEarning;
                        $Usr->save();
                        $Usrs = User::find($ref_userid);
                        $Usrs->wallet_balance += $campaignEarn;
                        $Usrs->save();

                        $referralEarning = new ReferralEarning;
                        $referralEarning->promoter_id = $req->user_id;
                        $referralEarning->referred_user_id = $ref_userid;
                        $referralEarning->referral_earnings = $campaignEarn;
                        $referralEarning->promotion_type = 'Campaign';
                        $referralEarning->transaction_date = $currentDate;
                        $referralEarning->save();
    
                        $transactions = new Transaction;
                        $transactions->user_id = $ref_userid;
                        $transactions->status='Confirmed'; 
                        $transactions->withdraw_amount = $campaignEarn;
                        $transactions->approved_amount = $campaignEarn;
                        $transactions->description = 'Charges For Refferal Code of Campaign  $'.$campaignEarn .' has been Credited on '.date('d/m/Y');
                        $transactions->transaction_type = 'Credit';
                        $transactions->save();
                        }elseif($req->status == 'Rejected'){

                            //User Walllet Balance
                        $Usr = User::find($req->user_id);
                        $Usr->wallet_balance -= $campaignEarning;
                        $Usr->save();
                        $Usrs = User::find($ref_userid);
                        $Usrs->wallet_balance -= $campaignEarn;
                        $Usrs->save();

                        $transactions = new Transaction;
                        $transactions->user_id = $ref_userid;
                        $transactions->status='Cancelled'; 
                        $transactions->withdraw_amount = (-$campaignEarn);
                        $transactions->approved_amount = (-$campaignEarn);
                        $transactions->description = 'Charges For Refferal Code of Campaign $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                        $transactions->transaction_type = 'Debit';
                        $transactions->save();
                        }else{}
                    }
    
                }
               else{
                 
             
                    //Transaction For Job Done
                    if($req->status == 'Approved'){
                        //User Walllet Balance
                        $Usr = User::find($req->user_id);
                        $Usr->wallet_balance += $campaignEarning;
                        $Usr->save();

                        $transactions = new Transaction;
                        $transactions->user_id = $req->user_id;
                        $transactions->status='Confirmed'; 
                        $transactions->withdraw_amount = $req->campaign_earnings;
                        $transactions->approved_amount = $req->campaign_earnings;
                        $transactions->description = 'Payment For Job Done $'.$req->campaign_earnings .' has been Credited on '.date('d/m/Y');
                        $transactions->transaction_type = 'Credit';
                        $transactions->save();
                    } 
                    elseif($req->status == 'Rejected'){

                        //User Walllet Balance
                        $Usr = User::find($req->user_id);
                        $Usr->wallet_balance -= $campaignEarning;
                        $Usr->save();

                        $transactions = new Transaction;
                        $transactions->user_id = $req->user_id;
                        $transactions->status='Cancelled'; 
                        $transactions->withdraw_amount = (-$req->campaign_earnings);
                        $transactions->approved_amount = (-$req->campaign_earnings);
                        $transactions->description = 'Payment For Job Done $'.$req->campaign_earnings .' has been Cancelled on '.date('d/m/Y');
                        $transactions->transaction_type = 'Debit';
                        $transactions->save();
                    }else{}
               }
                $req->session()->flash('success', 'Status updated Successfully!');
                return response()->json(["status"=>true,"msg"=>
                    "Status updated Successfully!","redirect_location"=>url("/history")]);
            } else {
                $req->session()->flash('error', 'Status Not Updated!');
                  return response()->json(["status"=>true,"redirect_location"=>url("/history")]);
            }
          

            
        }
                    
       // return view('history',compact('JobPaymentChecks'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
