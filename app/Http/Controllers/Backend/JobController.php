<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $data['datas'] = Job::orderBy('id', 'DESC')->paginate(10);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'salary' => 'required',
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
        $data['pageHeader'] = $this->pageHeader;
        $data['singleData'] = Job::find($id);
        $data['categories'] = Category::all();
        return view('backend.pages.jobs.edit', $data);
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
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'short_description' => 'required',
            'description' => 'required',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
