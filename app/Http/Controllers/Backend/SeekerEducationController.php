<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use App\Models\SeekerEducation;

class SeekerEducationController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.seekerEducations.index";
    public $create_route = "admin.seekerEducations.create";
    public $store_route = "admin.seekerEducations.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Seeker Educations",
            'sub_title' => "",
            'plural_name' => "Seeker Educations",
            'singular_name' => "Seeker Education",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/seekerEducations'),
        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkOwnPermission('seekerEducation.view');
        $pageHeader = $this->pageHeader;
        $seekerEducations = SeekerEducation::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.seekerEducations.index', compact('seekerEducations', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkOwnPermission('seekerEducation.create');
        $pageHeader = $this->pageHeader;
        $seekerEducations = SeekerEducation::all();
        return view('backend.pages.seekerEducations.create', compact('seekerEducations', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('seekerEducation.create');
        $request->validate([
            'institute_name' => 'required|max:50',
        ], [
            'institute_name.required' => 'Please Insert Institute Name',
        ]);
        $seekerEducation = new SeekerEducation();
        $seekerEducation->user_id = $request->user_id;
        $seekerEducation->institute_name = $request->institute_name;
        $seekerEducation->start_date = $request->start_date;
        $seekerEducation->end_date = $request->end_date;

        if ($seekerEducation->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkOwnPermission('seekerEducation.edit');
        $pageHeader = $this->pageHeader;
        $seekerEducations = SeekerEducation::find($id);
        return view('backend.pages.seekerEducations.edit', compact('seekerEducations', 'pageHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkOwnPermission('seekerEducation.edit');

        $seekerEducation = SeekerEducation::find($id);
        $request->validate([
            'institute_name' => 'required|max:50',
        ], [
            'institute_name.required' => 'Please Insert Institute Name',
        ]);

        $seekerEducation->user_id = $request->user_id;
        $seekerEducation->institute_name = $request->institute_name;
        $seekerEducation->start_date = $request->start_date;
        $seekerEducation->end_date = $request->end_date;

        if ($seekerEducation->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkOwnPermission('seekerEducation.delete');
        $deleteData = SeekerEducation::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
