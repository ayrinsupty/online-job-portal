<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class CandidateRegistrationController extends Controller
{
    public function registration()
    {
        $data['users'] = User::select('id', 'first_name')->get();
        return view('auth.candidate-register', $data);
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
                $user->image = imageUpload($request->image, 'Candidate');
            }
            if ($user->save()) {
                DB::commit();
                return redirectRouteHelper('candidate.store');
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
