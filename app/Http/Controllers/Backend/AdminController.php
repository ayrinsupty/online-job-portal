<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.admins.index";
    public $create_route = "admin.admins.create";
    public $store_route = "admin.admins.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Admins",
            'sub_title' => "",
            'plural_name' => "admins",
            'singular_name' => "Admin",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/admins'),

        ];
        Paginator::useBootstrapFive();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkOwnPermission('admin.view');
        $pageHeader = $this->pageHeader;
        $admins = Admin::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.admins.index', compact('admins', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkOwnPermission('admin.create');
        $pageHeader = $this->pageHeader;
        $roles = Role::all();
        return view('backend.pages.admins.create', compact('roles', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('admin.create');

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:' . with(new Admin)->getTable() . ',email',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new Admin)->getTable() . ',phone',
            'password' => 'required|min:8|confirmed',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->slug = Str::slug($request->name);
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->save();
        if ($request->admins) {
            $admin->assignRole($request->roles);
        }
        session()->flash('success', 'Admin has been created');
        return redirect()->route('admin.admins.index');
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
        $this->checkOwnPermission('admin.edit');
        $pageHeader = $this->pageHeader;
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles', 'pageHeader'));
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
        $this->checkOwnPermission('admin.edit');

        $user = Admin::find($id);
        $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|unique:' . with(new Admin)->getTable() . ',email,' . $id,
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new Admin)->getTable() . ',phone,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        $user = new Admin();
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->users()->detach();
        if ($request->user) {
            $user->assignRole($request->users);
        }
        session()->flash('success', 'Admin has been updated');
        return back();
    }

    public function isActive($id)
    {
        $this->checkOwnPermission('admin.edit');

        $data = Admin::where('id', $id)->first();
        if ($data->status == 'active') {
            $status = "inactive";
        } else {
            $status = "active";
        }
        Admin::where('id', $id)->update([

            'status' =>  $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkOwnPermission('admin.delete');
        $deleteData = Admin::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
