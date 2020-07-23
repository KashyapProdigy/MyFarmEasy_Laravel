<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Subuser;
use App\Activities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->get();
        $subuser = Subuser::where('user_id',$id)->get();
        $activities = Activities::where('user_id',$id)->get();

        return view('admin.activities')
                ->with('user',$user)
                ->with('subuser',$subuser)
                ->with('activities',$activities);
    }

    public function saveActivities(Request $request)
    {
        $activities = new Activities();
        $activities->title = $request->input('title');
        $activities->description = $request->input('description');
        $activities->act_date = $request->input('act_date');
        $activities->act_time = $request->input('act_time');
        $activities->act_by = $request->input('act_by');
        $activities->act_to = $request->input('act_to');

        $activities->user_id = Auth::user()->id;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $request->file('image')->extension();//getting File Extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/activities/',$filename);
            $activities->image = $filename;
        }

        $activities->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('activities')->with('status','New Activity Added ');
    }

    public function editActivities(Request $request ,$id)
    {
        $authid = Auth::user()->id;
        $user = User::where('id',$authid)->get();
        $subuser = Subuser::where('user_id',$authid)->get();
        $activities = Activities::findORFail($id);
        $subuser_list = Subuser::where('user_id',$authid)->get();

        return view('admin.activities.editactivities')
                ->with('user',$user)
                ->with('subuser',$subuser)
                ->with('activities',$activities);
    }

    public function updateActivities(Request $request ,$id)
    {
        $activities = Activities::findORFail($id);
        $activities->title = $request->input('title');
        $activities->description = $request->input('description');
        $activities->act_date = $request->input('act_date');
        $activities->act_time = $request->input('act_time');
        $activities->act_by = $request->input('act_by');
        $activities->act_to = $request->input('act_to');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $request->file('image')->extension();//getting File Extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/activities/',$filename);
            $activities->image = $filename;
        }
        $activities->update();

        $request->session()->flash('statuscode', 'success');
        return redirect('activities')->with('status','Activity Updated');
    }

    public function deleteActivities(Request $request , $id)
    {
        $activities = Activities::findORFail($id);
        $activities->delete();

        $request->session()->flash('statuscode', 'error');
        return redirect('activities')->with('status','Activity Deleted ');
    }

}
