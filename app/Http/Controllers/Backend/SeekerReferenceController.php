<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\SeekerReference;

class SeekerReferenceController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.seekerReferences.index";
    public $create_route = "admin.seekerReferences.create";
    public $store_route = "admin.seekerReferences.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Seeker References",
            'sub_title' => "",
            'plural_name' => "Seeker References",
            'singular_name' => "Seeker Reference",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/seekerReferences'),
        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkOwnPermission('seekerReference.view');
        $pageHeader = $this->pageHeader;
        $seekerReferences = SeekerReference::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.seekerReferences.index', compact('seekerReferences', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkOwnPermission('seekerReference.create');
        $pageHeader = $this->pageHeader;
        $seekerReferences = SeekerReference::all();
        return view('backend.pages.seekerReferences.create', compact('seekerReferences', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('seekerReference.create');
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new SeekerReference)->getTable() . ',phone',
        ], [
            'name.required' => 'Please Insert Name',
        ]);
        $seekerReference = new SeekerReference();
        $seekerReference->user_id = $request->user_id;
        $seekerReference->name = $request->name;
        $seekerReference->phone = $request->phone;
        $seekerReference->occupation = $request->occupation;
        $seekerReference->designation = $request->designation;

        if ($seekerReference->save()) {
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
        $this->checkOwnPermission('seekerReference.edit');
        $pageHeader = $this->pageHeader;
        $seekerReferences = SeekerReference::find($id);
        return view('backend.pages.seekerReferences.edit', compact('seekerReferences', 'pageHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkOwnPermission('seekerReference.edit');

        $seekerReference = SeekerReference::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new SeekerReference)->getTable() . ',phone',
        ], [
            'name.required' => 'Please Insert Name',
        ]);

        $seekerReference->user_id = $request->user_id;
        $seekerReference->name = $request->name;
        $seekerReference->phone = $request->phone;
        $seekerReference->occupation = $request->occupation;
        $seekerReference->designation = $request->designation;

        if ($seekerReference->save()) {
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
        $this->checkOwnPermission('seekerReference.delete');
        $deleteData = SeekerReference::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
