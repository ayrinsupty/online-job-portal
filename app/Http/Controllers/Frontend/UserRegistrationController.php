<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UserRegistrationController extends Controller
{
    public function registration()
    {
        $data['users'] = User::select('id', 'first_name')->get();
        return view('auth.register', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|unique:' . with(new User)->getTable() . ',email',
            'phone' => 'required|max:11|min:11|regex:' . phoneNoRegex() . '|unique:' . with(new User)->getTable() . ',phone',
            'address' => 'required',
            'password' => 'required',
            'type' => 'required',
            'image' => 'required',
        ]);

        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->type = $request->type;
            $user->status = User::$statusArrays[1];

            if (!empty($request->image)) {
                $user->image = imageUpload($request->image, 'User');
            }
            if ($user->save()) {
                DB::commit();
                return redirectRouteHelper('user.store');
            } else {
                DB::rollBack();
                return redirectRouteHelper();
            }
        } catch (QueryException $e) {
            DB::rollBack();
            return redirectRouteHelper();
        }
    }
}
