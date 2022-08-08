<?php

namespace App\Http\Controllers;
use App\Models\JobSpace;
use App\Models\JobPaymentCheck;
use App\Models\CampaignCategory;
use App\Models\SocialPlatform;
use App\Models\CampaignAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PromoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promote_to_earn');
    }  
}
