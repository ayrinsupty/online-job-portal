<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.companies.index";
    public $create_route = "admin.companies.create";
    public $store_route = "admin.companies.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Companies",
            'sub_title' => "",
            'plural_name' => "companies",
            'singular_name' => "Company",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/companies'),
        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkOwnPermission('company.view');
        $pageHeader = $this->pageHeader;
        $companies = Company::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.companies.index', compact('companies', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkOwnPermission('company.create');
        $pageHeader = $this->pageHeader;
        $companies = Company::all();
        return view('backend.pages.companies.create', compact('companies', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('company.create');
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new Company)->getTable() . ',phone',
        ], [
            'name.required' => 'Please Insert Name',
        ]);
        $company = new Company();
        $company->user_id = $request->user_id;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->status = Company::$statusArrays[0];

        if (!empty($request->logo)) {
            $company->logo = imageUpload($request->logo, 'Company');
        }
        if ($company->save()) {
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
        $this->checkOwnPermission('user.edit');
        $pageHeader = $this->pageHeader;
        $companies = Company::find($id);
        return view('backend.pages.companies.edit', compact('companies', 'pageHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkOwnPermission('user.edit');

        $company = Company::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new Company)->getTable() . ',phone,' . $id,
        ], [
            'name.required' => 'Please Insert Name',
        ]);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->status = Company::$statusArrays[0];

        if ($request->hasFile('logo')) {
            $path = 'images/' . $company->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if (!empty($request->logo)) {
            $company->logo = imageUpload($request->logo, 'Company');
        }

        if ($company->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    public function isActive($id)
    {
        $this->checkOwnPermission('company.edit');

        $data = Company::where('id', $id)->first();
        if ($data->status == 'active') {
            $status = "inactive";
        } else {
            $status = "active";
        }
        Company::where('id', $id)->update([

            'status' =>  $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkOwnPermission('company.delete');
        $deleteData = Company::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
