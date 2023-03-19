<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\SeekerExpert;

class SeekerExpertController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.seekerExperts.index";
    public $create_route = "admin.seekerExperts.create";
    public $store_route = "admin.seekerExperts.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Seeker Experts",
            'sub_title' => "",
            'plural_name' => "Seeker Experts",
            'singular_name' => "Seeker Expert",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/seekerExperts'),
        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkOwnPermission('seekerExpert.view');
        $pageHeader = $this->pageHeader;
        $seekerExperts = SeekerExpert::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.seekerExperts.index', compact('seekerExperts', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkOwnPermission('seekerExpert.create');
        $pageHeader = $this->pageHeader;
        $seekerExperts = SeekerExpert::all();
        return view('backend.pages.seekerExperts.create', compact('seekerExperts', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('seekerExpert.create');
        $request->validate([
            'name' => 'required|max:50',
        ], [
            'name.required' => 'Please Insert Name',
        ]);
        $seekerExpert = new SeekerExpert();
        $seekerExpert->user_id = $request->user_id;
        $seekerExpert->name = $request->name;

        if ($seekerExpert->save()) {
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
        $this->checkOwnPermission('seekerExpert.edit');
        $pageHeader = $this->pageHeader;
        $seekerExperts = SeekerExpert::find($id);
        return view('backend.pages.seekerExperts.edit', compact('seekerExperts', 'pageHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkOwnPermission('seekerExpert.edit');

        $seekerExpert = SeekerExpert::find($id);
        $request->validate([
            'name' => 'required|max:50',
        ], [
            'name.required' => 'Please Insert Name',
        ]);

        $seekerExpert->user_id = $request->user_id;
        $seekerExpert->name = $request->name;

        if ($seekerExpert->save()) {
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
        $this->checkOwnPermission('seekerExpert.delete');
        $deleteData = SeekerExpert::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
