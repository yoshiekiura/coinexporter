<?php

namespace App\Http\Controllers;
use App\Models\JobSpace;
use App\Models\TvlCampaign;
use App\Models\CampaignCategory;
use App\Models\CampaignSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MycampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data['job_space'] = JobSpace::orderBy('id','desc')->paginate(5);
        return view('mycampaign');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mycampaign');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo 12;exit;
        $request->validate([
            'campaign_type' => 'required',
            'social_platform' => 'required',
            'country' => 'required',
            'campaign_desc' => 'required',
            'campaign_proof_desc' => 'required',
            'file_type' => '',
            // 'file_name' => 'mimes:png,jpg,jpeg,csv,txt,pdf|max:2048',
            //'file_name' => 'mimes:*',
            'promoters_earn' => 'required',
            'campaign_cost' => 'required',
            'promoters_needed' => 'required',
            'text_content' => '',
            'colors' => ''

            ]);
          
            $objCat = CampaignCategory::where('id', '=', $request->campaign_type)->first();
            $cat_name = $objCat->campaign_category_name;

            $objSubCat = CampaignSubCategory::where('id', '=', $request->social_platform)->first();
            $sub_cat_name = $objSubCat->campaign_subcategory_name;
            
            $camp_name = $cat_name.' '.$sub_cat_name.' $'.$request->promoters_earn;
            $mycampaign = new JobSpace;
            $mycampaign->campaign_category_id = $request->campaign_type;
            $mycampaign->campaign_subcategory_id = $request->social_platform;
            $mycampaign->campaign_name = $camp_name;
            // $mycampaign->country = $request->country;
            $mycampaign->campaign_req = $request->campaign_desc;
            $mycampaign->campaign_proof = $request->campaign_proof_desc;
            $mycampaign->campaign_earning = $request->promoters_earn;
            $mycampaign->promoters_needed = $request->promoters_needed;
            $mycampaign->campaign_cost = $request->campaign_cost;
            $mycampaign->file_type = $request->file_type;
                $user_id =  Auth::user()->id;
                $status='active';
            $mycampaign->status = $status;
            $mycampaign->user_id = $user_id;

            //For Checkbox array list values
            if(!empty($request->colors)){
            $col= $request->colors;
            $cols =implode(",", $col);
          
           // dd($cols);
            $mycampaign->colors=$cols;

            $country= $request->country;
            $countries =implode(":", $country);
            $mycampaign->country=$countries;
        }else{
            $mycampaign->colors = $request->colors;
        }

            if(!empty($request->text_content)){
                $mycampaign->file_name = $request->text_content;
                
            }
            elseif(!empty($request->file('file_name'))){
                
                $destinationPath = 'uploads';
            
                if ($request->file('file_name')) {
                    $imgfile = $request->file('file_name');
                    $imgFilename=$imgfile->getClientOriginalName();
                    $imgfile->move($destinationPath,$imgfile->getClientOriginalName());
                    $mycampaign->file_name = $imgFilename;
                }
                 
                 else{ return redirect()->route('mycampaign')->with('error','Could not get file to upload!'); }
             }else{
                $destinationPath = 'uploads';
            
                if ($request->file('file_name1')) {
                    $imgfile = $request->file('file_name1');
                    $imgFilename=$imgfile->getClientOriginalName();
                    $imgfile->move($destinationPath,$imgfile->getClientOriginalName());
                    $mycampaign->file_name = $imgFilename;
                }
                 
                 else{ return redirect()->route('mycampaign')->with('error','Could not get file to upload!'); }
             }

            // $mycampaign->file_name = $request->file('file_name')->getClientOriginalName();
 
            // $mycampaign = $request->file('file_name')->store('public/uploads/upload_files');
            $mycampaign->save();
           // return back()->with('success','mycampaign has been created successfully!');
             if( $mycampaign->save()){
                $camp_id =$mycampaign->id;
                $request->validate([
                    'transaction_amt' => ''
                    ]);
                   
                    $tvlcampaign = new TvlCampaign;
                    $tvlcampaign->campaign_id = $camp_id;
                    $status=1;
                    $tvlcampaign->status = $status;
                    $trans_amt= $request->transaction_amt;
                   // $trans_amtt =implode(",", $trans_amt);
                    $tvlcampaign->tvl_amount = $trans_amt;
                    $tvlcampaign->save();
            return redirect()->route('mycampaign')->with('success','Mycampaign has been created successfully!');
             }else{
                return redirect()->route('mycampaign')->with('error','Unsuccess!');
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mycampaign',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('mycampaign',compact('id'));
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
        $mycampaign->delete();
        return redirect()->route('mycampaign')
        ->with('success','mycampaign has been deleted successfully');
    }
}
