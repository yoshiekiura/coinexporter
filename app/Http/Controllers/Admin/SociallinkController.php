<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\SocialLink;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Image; 
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SociallinkController extends Controller
{
	protected string $guard = 'admin';
    public function guard() 
    {
        return Auth::guard($this->guard);
    }
    function __construct()
	{
		$this->middleware('auth:admin');
		$this->middleware('permission:sociallink-list', ['only' => ['index','store']]);

        $social_link_list = Permission::get()->filter(function($item) {
            return $item->name == 'sociallink-list';
        })->first();
      

        if ($social_link_list == null) {
            Permission::create(['name'=>'sociallink-list']);
        }
       
	}

	public function index(Request $request)
	{
		$sociallinks = SocialLink::all();
        
		return view('admin.sociallinks.index',compact('sociallinks'));
	}

    
	
    public function verify(Request $request, $id)
	{
        $sociallinks =SocialLink::where('id',$id)->first();
		try {
            
            $sociallinks->status = 'Verified'; 
            $sociallinks->save();
                Toastr::success(__('sociallink.message.verify.success'));
                return redirect()->route('sociallinks.index');
                }catch (Exception $e) {
                    $error_msg = Toastr::error(__('sociallinks.message.verify.error'));
                    return redirect()->route('sociallinks.index')->with($error_msg);
                }   
	}

    public function reject(Request $request, $id)
	{
		$sociallinks =SocialLink::where('id',$id)->first();
		try {
            
            $sociallinks->status = 'Rejected';
            $sociallinks->save();
                Toastr::success(__('sociallink.message.reject.success'));
                return redirect()->route('sociallinks.index');
                }catch (Exception $e) {
                    $error_msg = Toastr::error(__('sociallinks.message.reject.error'));
                    return redirect()->route('sociallinks.index')->with($error_msg);
                }   
	}
}
