<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SocialPlatform;
use App\Models\SocialLink;
use App\Models\Country;
use App\Models\JobDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class MyaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $SocialPlatform = SocialPlatform::select('social_platform.*')->get();

        $userData = User::where('id', $id)->first();
        $country = Country::where('id', $userData->country)->first();

        return view('myaccount', compact('userData', 'country', 'SocialPlatform'));
    }

    public function create(request $req)
    {

            if ($req->channelId == "0") {
               
                $socialData = new SocialLink;
                $socialData->status = $req->status;
                $socialData->channel_link = $req->linkName;
                $socialData->channel_name = $req->channelData;
                $socialData->user_id = $req->userId;
                $socialData->channel_id = $req->socialPlatformId;
                
                if ($socialData->save()) {
                      $req->session()->flash('success', 'Social Channel saved Successfully!');
                      //return response()->json(["status"=>true,"redirect_location"=>url("/myaccount")]);
                } else {
                    $req->session()->flash('error', 'Social Channel Not saved!');
                    //return response()->json(["status"=>true,"redirect_location"=>url("/myaccount")]);
                }
             } else {
                $socialData = SocialLink::find($req->channelId);
                $res = strcmp($socialData->channel_name,$req->channelData);
                $ress = strcmp($socialData->channel_link,$req->linkName);
                
                if(($res != 0 && $ress == 0) || ($res == 0 && $ress != 0) || ($res != 0 && $ress != 0)) {
                    $status = $socialData->status;
                    $socialData->status = $status;
                    $socialData->channel_link = $req->linkName;
                    $socialData->channel_name = $req->channelData;
                    $socialData->user_id = $req->userId;
                    if ($socialData->save()) {
                        $req->session()->flash('success', 'Social Channel updated Successfully!');
                        return response()->json(["status"=>true,"msg"=>
                            "Social Channel updated Successfully!","redirect_location"=>url("/myaccount")]);
                    } else {
                        $req->session()->flash('error', 'Social Channel Not Updated!');
                          return response()->json(["status"=>true,"redirect_location"=>url("/myaccount")]);
                    }
                }
                else {
                    $req->session()->flash('error', 'Something went wrong. Please Check.');
                        return response()->json(["status"=>true,"msg"=>
                            "Something went wrong. Please Check.","redirect_location"=>url("/myaccount")]);
                }
               
             }
       
    }

    public function controlpanel(request $req){
        $totalActualBalance = JobDone::where('user_id',Auth::user()->id)->where('status','Approved')->where('earning_status','Success')->sum('campaign_earnings');
        $withdrawalBalance = JobDone::where('user_id',Auth::user()->id)->where('status','Approved')->where('earning_status','On-Going')->sum('campaign_earnings');
        $totalPendingBalance = JobDone::where('user_id',Auth::user()->id)->where('status','Pending')->sum('campaign_earnings');
        $totalBalances = $totalActualBalance + $totalPendingBalance;
        
        return view('controlpanel',compact('totalActualBalance','withdrawalBalance','totalPendingBalance','totalBalances'));
    }
}
