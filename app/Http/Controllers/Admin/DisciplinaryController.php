<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobDone;
use App\Models\JobSpace;
use App\Models\Transaction;
use App\Models\ReferralEarning;
use App\Models\SocialLink;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Image; 
use Storage;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DisciplinaryController extends Controller
{
	protected string $guard = 'admin';
    public function guard() 
    {
        return Auth::guard($this->guard);
    }
    function __construct()
	{
		$this->middleware('auth:admin');
		
	}

	public function index(Request $request)
	{
		
        $JobPaymentChecks = JobDone::select(

            "job_dones.*",

            "job_dones.created_at as created",

            "job_dones.status as tvl_status",

            "job_dones.user_id as userid",

            "job_dones.id as logid",
            
            "job_spaces.*",
            
            "campaign_categories.*"

        )

        ->join("job_spaces", "job_spaces.id", "=", "job_dones.campaign_id")
        ->join("campaign_categories", "job_spaces.campaign_category_id", "=", "campaign_categories.id")
        ->where('job_dones.status','Rejected')
        // ->where('job_dones.appeal_by_promoter','!=','')
        ->orderBy("job_dones.id","desc")
        ->get();
		return view('admin.employer.complain',compact('JobPaymentChecks'));
	}


    public function approve(Request $request, $id)
	{
        $objJobDone =JobDone::where('id',$id)->first();
		try {
            
            $objJobDone->emp_comp_sts = 'AdminApproved';      
                          
            if($objJobDone->save()){
                $transactions = new Transaction;
                    $transactions->user_id = $objJobDone->user_id;
                    $transactions->status='Confirmed'; 
                    $transactions->withdraw_amount = $objJobDone->campaign_earnings;
                    $transactions->approved_amount = $objJobDone->campaign_earnings;
                    $transactions->description = 'Payment For Job Done $'.$objJobDone->campaign_earnings .' has been Credited on '.date('d/m/Y');
                    $transactions->transaction_type = 'Credit';
                    $transactions->save();

                 //check referral code of camapign
                 $JobRefs = JobSpace::select('referrer_code','created_at')->where('user_id',$objJobDone->user_id)->first();
                 $JobcurrentDate = date('Y-m-d');
                 $JobcreatedDate = date("Y-m-d", strtotime($JobRefs->created_at));
 
                 //Calculate days from given dates of campaign referral
                 $Jobdatetime1 = new DateTime($JobcurrentDate);
                 $Jobdatetime2 = new DateTime($JobcreatedDate);
                 $Jobinterval = $Jobdatetime1->diff($Jobdatetime2);
                 $Jobdays = $Jobinterval->format('%a');
 
                 //check referral code of registration
                 $Refs = User::select('referrer_code','created_at')->where('id',$objJobDone->user_id)->first();
                 $currentDate = date('Y-m-d');
                 $createdDate = date("Y-m-d", strtotime($Refs->created_at));
 
                 //Calculate days from given dates of registration referral
                 $datetime1 = new DateTime($currentDate);
                 $datetime2 = new DateTime($createdDate);
                 $interval = $datetime1->diff($datetime2);
                 $days = $interval->format('%a');
                            
                 if((!empty($Refs->referrer_code)) && (!empty($JobRefs->referrer_code))){
                    $sel= JobSpace::select('job_spaces.user_id')->join('users','job_spaces.user_id','=','users.id')->where('job_spaces.referral_code',$JobRefs->referrer_code)->where('users.referral_code',$Refs->referrer_code)->first();
                    $ref_userid = $sel->user_id;
                    if($sel){
                    if(($days <= 30) || ($Jobdays <= 30)){
                        $campaignEarn = $campaignEarning * 3/100;
                        
                        $referralEarning = new ReferralEarning;
                        $referralEarning->promoter_id = $objJobDone->user_id;
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
                     
                    }
                    }
                }
                elseif(!empty($Refs->referrer_code)){
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
                       
                        $referralEarning = new ReferralEarning;
                        $referralEarning->promoter_id = $objJobDone->user_id;
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
                      
                    }
                }
                elseif(!empty($JobRefs->referrer_code)){
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
                       
                        $referralEarning = new ReferralEarning;
                        $referralEarning->promoter_id = $objJobDone->user_id;
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
                       
                    }
    
                }
            
        
               else{}
			 return redirect()->route('employers.complain')->with(Toastr::success(__('employercomplain.message.approve.success')));
            }
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('employercomplain.message.approve.success'));
			return redirect()->route('employers.complain')->with($error_msg);
		}
	}

    public function reject(Request $request, $id)
	{
		$objJobDone = JobDone::where('id',$id)->first();
		try {
            
            $objJobDone->status = 'Approved';
            $objJobDone->emp_comp_sts = 'AdminRejected'; 
                
            if($objJobDone->save()){

                $transactions = new Transaction;
                $transactions->user_id = $objJobDone->user_id;
                $transactions->status='Cancelled'; 
                $transactions->withdraw_amount = (-$objJobDone->campaign_earnings);
                $transactions->approved_amount = (-$objJobDone->campaign_earnings);
                $transactions->description = 'Payment For Job Done $'.$objJobDone->campaign_earnings .' has been Cancelled on '.date('d/m/Y');
                $transactions->transaction_type = 'Debit';
                $transactions->save();
                $campaignEarning = $objJobDone->campaign_earnings;

                //check referral code of camapign
                $JobRefs = JobSpace::select('referrer_code','created_at')->where('user_id',$objJobDone->user_id)->first();
                $JobcurrentDate = date('Y-m-d');
                $JobcreatedDate = date("Y-m-d", strtotime($JobRefs->created_at));

                //Calculate days from given dates of campaign referral
                $Jobdatetime1 = new DateTime($JobcurrentDate);
                $Jobdatetime2 = new DateTime($JobcreatedDate);
                $Jobinterval = $Jobdatetime1->diff($Jobdatetime2);
                $Jobdays = $Jobinterval->format('%a');

                //check referral code of registration
                $Refs = User::select('referrer_code','created_at')->where('id',$objJobDone->user_id)->first();
                $currentDate = date('Y-m-d');
                $createdDate = date("Y-m-d", strtotime($Refs->created_at));

                //Calculate days from given dates of registration referral
                $datetime1 = new DateTime($currentDate);
                $datetime2 = new DateTime($createdDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                
                 if((!empty($Refs->referrer_code)) && (!empty($JobRefs->referrer_code))){
                    $sel= JobSpace::select('job_spaces.user_id')->join('users','job_spaces.user_id','=','users.id')->where('job_spaces.referral_code',$JobRefs->referrer_code)->where('users.referral_code',$Refs->referrer_code)->first();
                    $ref_userid = $sel->user_id;
                    if($sel){
                    if(($days <= 30) || ($Jobdays <= 30)){
                        $campaignEarn = $campaignEarning * 3/100;
                        
                        $transactions = new Transaction;
                        $transactions->user_id = $ref_userid;
                        $transactions->status='Cancelled'; 
                        $transactions->withdraw_amount = (-$campaignEarn);
                        $transactions->approved_amount = (-$campaignEarn);
                        $transactions->description = 'Charges For Refferal Code of Both Registration and Campaign of $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                        $transactions->transaction_type = 'Debit';
                        $transactions->save();
                        
                    }
                    }
                }
                elseif(!empty($Refs->referrer_code)){
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
                       
                        $transactions = new Transaction;
                        $transactions->user_id = $ref_userid;
                        $transactions->status='Cancelled'; 
                        $transactions->withdraw_amount = (-$campaignEarn);
                        $transactions->approved_amount = (-$campaignEarn);
                        $transactions->description = 'Charges For Refferal Code of Registration $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                        $transactions->transaction_type = 'Debit';
                        $transactions->save();
                       
                    }
                }
                elseif(!empty($JobRefs->referrer_code)){
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
                        
                        $transactions = new Transaction;
                        $transactions->user_id = $ref_userid;
                        $transactions->status='Cancelled'; 
                        $transactions->withdraw_amount = (-$campaignEarn);
                        $transactions->approved_amount = (-$campaignEarn);
                        $transactions->description = 'Charges For Refferal Code of Campaign $'.$campaignEarn .' has been Cancelled on '.date('d/m/Y');
                        $transactions->transaction_type = 'Debit';
                        $transactions->save();
                       
                    }
    
                }
            
        
               else{}
                return redirect()->route('employers.complain')->with(Toastr::success(__('employercomplain.message.reject.success')));

            }
			
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('employercomplain.message.reject.success'));
			return redirect()->route('employers.complain')->with($error_msg);
		}
	}

    public function view(Request $request, $id){
        $objJobDone = JobDone::where('id',$id)->first();
		
        return view('admin.employer.view_complain',compact('objJobDone'));
    }
}
