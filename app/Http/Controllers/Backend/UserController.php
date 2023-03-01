<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public $pageHeader;
    public $show_fields;
    public $insert_fields;
    public $update_fields;
    public $except_column;
    public $index_route = "admin.users.index";
    public $create_route = "admin.users.create";
    public $store_route = "admin.users.store";

    public function __construct()
    {
        $this->checkGuard();
        $this->pageHeader = [
            'title' => "Users",
            'sub_title' => "",
            'plural_name' => "users",
            'singular_name' => "User",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'base_url' => url('admin/users'),

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
        $this->checkOwnPermission('view');
        $pageHeader = $this->pageHeader;
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.users.index',compact('users','pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkOwnPermission('create');
        $pageHeader = $this->pageHeader;

        $roles = Role::all();
        return view('backend.pages.users.create',compact('roles','pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkOwnPermission('create');
        $request->validate([
            'name'=> 'required|max:50',
            'email'=> 'required|unique:users',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new User)->getTable() . ',phone',
            'password'=> 'required|min:8|confirmed',
        ],[
            'name.required' => 'Please Insert New User Name'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        session()->flash('success','User has been created');
        return redirect()->route('admin.users.index');

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
        $this->checkOwnPermission('edit');
        $pageHeader = $this->pageHeader;

        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.users.edit',compact('user','roles','pageHeader'));
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
        $this->checkOwnPermission('edit');

        $user = User::find($id);
        $request->validate([
            'name'=> 'required|max:50',
            'email'=> 'required|email|unique:users,email,'.$id,
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new User)->getTable() . ',phone,' . $id,
            'password'=> 'nullable|min:8|confirmed',
        ],[
            'name.required' => 'Please Insert New User Name'
        ]);
        // $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password !=null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        session()->flash('success','User has been updated');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkOwnPermission('delete');
         $user = User::findById($id);
         if (!is_null($user)) {
             $user->delete();
         }
         session()->flash('success','User has been deleted');
         return back();

    }
}

