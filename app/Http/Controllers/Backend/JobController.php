<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class JobController extends Controller
{
    public $pageHeader;
    public $index_route = "admin.jobs.index";
    public $create_route = "admin.jobs.create";
    public $store_route = "admin.jobs.store";
    public $edit_route = "admin.jobs.edit";
    public $update_route = "admin.jobs.update";

    public function __construct()
    {
        Paginator::useBootstrapFive();
        $this->pageHeader = [
            'title' => "Jobs",
            'sub_title' => "",
            'plural_name' => "jobs",
            'singular_name' => "Job",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'edit_route' => $this->edit_route,
            'update_route' => $this->update_route,
            'base_url' => url('admin/jobs'),

        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['datas'] = Job::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.jobs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['categories'] = Category::all();
        return view('backend.pages.jobs.create', $data);
    }

    public function allApply($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['datas'] = Apply::where('job_id', $id)->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.jobs.all-applies', $data);
    }

    public function shortListed($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['datas'] = Apply::where('job_id', $id)->where('status', \App\Models\Apply::$statusArray[1])->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.jobs.short-listed', $data);
    }

    public function confirmListed($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['datas'] = Apply::where('job_id', $id)->where('status', \App\Models\Apply::$statusArray[2])->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.jobs.confirm-listed', $data);
    }

    public function approveReject($id, $type)
    {
        $row = Apply::find($id);
        $row->status = $type;
//        return $row;
        $row->save();
        return redirect()->route('admin.all.apply',$id);
    }

 public function approvaldelete($id)
    {
        $row = Appointment::find($id);
        $row->delete();
        return back();
    }
 public function approvaldone($id)
    {
        $row = Appointment::find($id);
        $row->status= 'Done';
        $row->save();
        return back();
    }

    public function viewApplication($jobid, $userid)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['seeker'] = Apply::where('job_id', $jobid)->where('user_id', $userid)->first();
        return view('backend.pages.jobs.seeker-cv', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:30',
            'short_description' => 'required|max:25',
            'description' => 'required',
            'salary' => 'nullable',
            'type' => 'required',
            'application_last_date' => 'required',
        ]);
        $row = new Job;
        $row->user_id = auth()->id();
        $row->category_id = $request->category_id;
        $row->title = $request->title;
        $row->salary = $request->salary;
        $row->type = $request->type;
        $row->short_description = $request->short_description;
        $row->description = $request->description;
        $row->application_last_date = $request->application_last_date;
        if ($row->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['singleData'] = Job::find($id);
        $data['categories'] = Category::all();
        return view('backend.pages.jobs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'salary' => 'nullable',
            'type' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'application_last_date' => 'required',
        ]);
        $row = Job::find($id);
        $row->user_id = auth()->id();
        $row->category_id = $request->category_id;
        $row->title = $request->title;
        $row->salary = $request->salary;
        $row->type = $request->type;
        $row->short_description = $request->short_description;
        $row->description = $request->description;
        $row->application_last_date = $request->application_last_date;
        if ($row->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }
public function appointmentPost(Request $request,$id)
{
$row = new Appointment();
//    $row->user_id =
        $row->user_id = $request->user_id;
        $row->apply_id= $id;
        $row->link = $request->link;
        $row->meeting_time = $request->meeting_time;
        $row->save();
        return back();

}
    public function appointmentRequest($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['apply'] = Apply::find($id);
         $data['appointments'] = Appointment::with('apply','user')->where('apply_id', $id)->get();
        return view('backend.pages.jobs.appointment',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Job::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
