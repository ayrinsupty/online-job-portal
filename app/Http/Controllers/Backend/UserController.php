<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

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
//        $this->checkOwnPermission('user.view');
        $pageHeader = $this->pageHeader;
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.users.index', compact('users', 'pageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->checkOwnPermission('user.create');
        $pageHeader = $this->pageHeader;
        $users = User::all();
        return view('backend.pages.users.create', compact('users', 'pageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->checkOwnPermission('user.create');
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|unique:users',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new User)->getTable() . ',phone',
        ], [
            'first_name.required' => 'Please Insert First Name',
            'last_name.required' => 'Please Insert Last Name',
            'username.required' => 'Please Insert Username'
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->status = User::$statusArrays[0];

        if (!empty($request->image)) {
            $user->image = imageUpload($request->image, 'User');
        }
        if ($user->save()) {
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
//        $this->checkOwnPermission('user.edit');
        $pageHeader = $this->pageHeader;
        $users = User::find($id);
        return view('backend.pages.users.edit', compact('users', 'pageHeader'));
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
//        $this->checkOwnPermission('user.edit');

        $user = User::find($id);
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new User)->getTable() . ',phone,' . $id,
        ], [
            'name.required' => 'Please Insert First Name',
            'last_name.required' => 'Please Insert Last Name',
            'username.required' => 'Please Insert Username'
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->status = User::$statusArrays[0];

        if ($request->hasFile('image')) {
            $path = 'images/' . $user->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if (!empty($request->image)) {
            $user->image = imageUpload($request->image, 'User');
        }

        if ($user->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    public function isActive($id)
    {
//        $this->checkOwnPermission('user.edit');

        $data = User::where('id', $id)->first();
        if ($data->status == 'active') {
            $status = "inactive";
        } else {
            $status = "active";
        }
        User::where('id', $id)->update([

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
//        $this->checkOwnPermission('user.delete');
        $deleteData = User::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
