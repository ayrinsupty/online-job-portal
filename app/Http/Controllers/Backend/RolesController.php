<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Pagination\Paginator;

class RolesController extends Controller
{
    public $user;
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.roles.index";
    public $create_route = "admin.roles.create";
    public $store_route = "admin.roles.store";
    public function __construct()
    {
        $this->checkGuard();
        Paginator::useBootstrapFive();
        $this->pageHeader = [
            'title' => "Roles",
            'sub_title' => "",
            'plural_name' => "roles",
            'singular_name' => "Role",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/roles'),

        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkOwnPermission('role.view');
        $pageHeader = $this->pageHeader;
        $roles = Role::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.roles.index',compact('roles','pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkOwnPermission('role.create');
        $pageHeader = $this->pageHeader;

        $permission_groups=Admin::getpermissionGroups();
        $permissions = Permission::all();
        return view('backend.pages.roles.create',compact('permissions','permission_groups','pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('role.create');
        $request->validate([
            'name'=> 'required|max:100|unique:roles'
        ],[
            'name.required' => 'Please Insert New Role Name'
        ]);
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        $permissions = $request->permissions;
        if ($role) {
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            return back()->with('success','New Role Created');
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
        $this->checkOwnPermission('role.edit');
        $pageHeader = $this->pageHeader;

        $role = Role::findById($id,'admin');
        $permission_groups=Admin::getpermissionGroups();
        $permissions = Permission::all();
        return view('backend.pages.roles.edit',compact('role','permissions','permission_groups','pageHeader'));
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
        $this->checkOwnPermission('role.edit');
        $request->validate([
            'name'=> 'required|max:100'
        ],[
            'name.required' => 'Please Insert New Role Name'
        ]);
        // $role = Role::create(['name' => $request->name]);
        $role = Role::findById($id,'admin');
        $permissions = $request->permissions;
        if ($role) {
            if (!empty($permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($permissions);
            }
            return back()->with('success','Role Updated');
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
        $this->checkOwnPermission('role.delete');
        $deleteData = Role::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }

    }
}

