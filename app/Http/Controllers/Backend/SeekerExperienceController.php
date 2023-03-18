<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\SeekerExperience;

class SeekerExperienceController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.seekerExperiences.index";
    public $create_route = "admin.seekerExperiences.create";
    public $store_route = "admin.seekerExperiences.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Seeker Experiences",
            'sub_title' => "",
            'plural_name' => "Seeker Experiences",
            'singular_name' => "Seeker Experience",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/seekerExperiences'),
        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkOwnPermission('seekerExperience.view');
        $pageHeader = $this->pageHeader;
        $seekerExperiences = SeekerExperience::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.seekerExperiences.index', compact('seekerExperiences', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkOwnPermission('seekerExperience.create');
        $pageHeader = $this->pageHeader;
        $seekerExperiences = SeekerExperience::all();
        return view('backend.pages.seekerExperiences.create', compact('seekerExperiences', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('seekerExperience.create');
        $request->validate([
            'company_name' => 'required|max:50',
        ], [
            'company_name.required' => 'Please Insert Company Name',
        ]);
        $seekerExperience = new SeekerExperience();
        $seekerExperience->user_id = $request->user_id;
        $seekerExperience->company_name = $request->company_name;
        $seekerExperience->designation = $request->designation;
        $seekerExperience->from_date = $request->from_date;
        $seekerExperience->to_date = $request->to_date;

        if ($seekerExperience->save()) {
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
        $this->checkOwnPermission('seekerExperience.edit');
        $pageHeader = $this->pageHeader;
        $seekerExperiences = SeekerExperience::find($id);
        return view('backend.pages.seekerExperiences.edit', compact('seekerExperiences', 'pageHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkOwnPermission('seekerExperience.edit');

        $seekerExperience = SeekerExperience::find($id);
        $request->validate([
            'company_name' => 'required|max:50',
        ], [
            'company_name.required' => 'Please Insert Company Name',
        ]);

        $seekerExperience->user_id = $request->user_id;
        $seekerExperience->company_name = $request->company_name;
        $seekerExperience->designation = $request->designation;
        $seekerExperience->from_date = $request->from_date;
        $seekerExperience->to_date = $request->to_date;

        if ($seekerExperience->save()) {
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
        $this->checkOwnPermission('seekerExperience.delete');
        $deleteData = SeekerExperience::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
