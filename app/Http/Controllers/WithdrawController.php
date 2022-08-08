<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\UserTransaction;
use App\Models\JobDone;
use App\Models\ReferralEarning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class WithdrawController extends Controller
{
    public function index()
    {
      
        $campaign_earnings = JobDone::where('user_id',Auth::user()->id)->where('status','Approved')->where('earning_status','Success')->sum('campaign_earnings');
        $referral_earnings = ReferralEarning::where('referred_user_id',Auth::user()->id)->sum('referral_earnings');
        $totalActualBalance = round(($campaign_earnings + $referral_earnings),2);
        $userTransaction = UserTransaction::latest()->where('user_id',Auth::user()->id)->get();
        $withdrawalBalance =UserTransaction::where('user_id',Auth::user()->id)->where('status','Pending')->sum('transaction_amount');
        
        return view('withdraw',compact('totalActualBalance','userTransaction','withdrawalBalance'));
    }


    public function create(Request $request)
    {
        $pending = UserTransaction::where('user_id',Auth::user()->id)->where('status','Pending')->get();
        if(count($pending) <= 0){
            $jobDone = JobDone::where('user_id',Auth::user()->id)->where('status','Approved')->where('earning_status','Success')->get();
            if($jobDone){
                foreach($jobDone as $val) {
                    $objJobdone = JobDone::where('id',$val->id)->first();
                    $objJobdone->earning_status = 'On-Going';
                    $objJobdone->save();
                }
            }
            $objTransaction = new UserTransaction();
            $objTransaction->user_id = Auth::user()->id;
            $objTransaction->transaction_amount = $request->amt_to_withdraw;
            $objTransaction->transaction_detail = '$'.$request->amt_to_withdraw .' has requested to withdraw on '.date('d/m/Y');
            $objTransaction->wallet_balance = '';
            $objTransaction->status = 'Pending';
            if($objTransaction->save()){
                return response()->json(["status"=>true,"msg"=>"withdrawal completed successfully!"]);
            }
            else {
                return response()->json(["status"=>false,"msg"=>"something went wrong"]);
            }
       }
       else {
        return response()->json(["status"=>false,"msg"=>"Sorry You can't request for withdraw. Beacuse you have already pending balance to approve."]);
        }
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
