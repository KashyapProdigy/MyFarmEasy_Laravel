<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Designation;
use App\Subuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubuserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $designation = Designation::where('user_id',$id)->get();
        $subuser = Subuser::where('user_id',$id)->get();

        return view('admin.subuser')
                 ->with('designation',$designation)
                 ->with('subuser',$subuser);
    }

    public function saveDesignation(Request $request)
    {
        $designation = new Designation;

        $designation->name = $request->input('designation_name');
        $designation->user_id = Auth::user()->id;


        $designation->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('subuser')->with('status','New Designation Added');
    }

    public function editDesignation(Request $request, $id)
    {
        $currentdesignation = Designation::findORFail($id);

        return view('admin.subuser.editdesignation')
                ->with('currentdesignation',$currentdesignation);
    }

    public function updateDesignation(Request $request, $id)
    {
        $designation = Designation::findORFail($id);

        $designation->name = $request->input('designation_name');
        $designation->update();

        $request->session()->flash('statuscode', 'success');
        return redirect('subuser')->with('status','Designation Updated');
    }

    public function deleteDesignation(Request $request, $id)
    {
        $designation = Designation::findORFail($id);
        $designation->delete();

        $request->session()->flash('statuscode', 'error');
        return redirect('subuser')->with('status','Designation Deleted ');
    }

    public function saveSubuser(Request $request )
    {
        $id = Auth::user()->id;
        $subuser = new Subuser;
        $subuser->name = $request->input('name');
        $subuser->phone = $request->input('phone');
        $subuser->password = $request->input('password');
        $subuser->user_id = Auth::user()->id;
        $subuser->designation_id = $request->input('designation_id');
        $subuser->reports_to = $request->input('reports_to');
        $subuser->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('subuser')->with('status','New Subuser Added ');
    }

    public function editSubuser(Request $request , $id)
    {
        $authid = Auth::user()->id;
        $designation = Designation::where('user_id',$authid)->get();
        $subuser = Subuser::findORFail($id);
        $subuser_list = Subuser::where('user_id',$authid)->get();

        return view('admin.subuser.editsubuser')
                ->with('subuser',$subuser)
                ->with('designation',$designation)
                ->with('subuser_list',$subuser_list);
    }

    public function updateSubuser(Request $request , $id)
    {
        $subuser = Subuser::findORFail($id);
        $subuser->name = $request->input('name');
        $subuser->phone = $request->input('phone');
        $subuser->password = $request->input('password');
        $subuser->user_id = Auth::user()->id;
        $subuser->designation_id = $request->input('designation_id');
        $subuser->reports_to = $request->input('reports_to');
        $subuser->update();

        $request->session()->flash('statuscode', 'success');
        return redirect('subuser')->with('status','Subuser Updated');
    }

    public function deleteSubuser(Request $request , $id)
    {
        $subuser = Subuser::findORFail($id);
        $subuser->delete();

        $request->session()->flash('statuscode', 'error');
        return redirect('subuser')->with('status','Subuser Deleted ');
    }
}
