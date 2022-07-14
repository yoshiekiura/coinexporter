<?php

namespace App\Http\Controllers;
use App\Models\JobPaymentCheck;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $JobPaymentChecks = JobPaymentCheck::select(

            "job_payment_check.*", 

            "job_payment_check.status as tvl_status",
            
            "job_spaces.*",
            
            "campaign_categories.*"

        )

        ->join("job_spaces", "job_spaces.id", "=", "job_payment_check.campaign_id")
        
        ->join("campaign_categories", "job_spaces.campaign_category_id", "=", "campaign_categories.id")
        
        ->orderBy("job_payment_check.id","desc")

        ->where('job_spaces.id', $id)

        ->get();
        return view('history',compact('JobPaymentChecks'));
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
