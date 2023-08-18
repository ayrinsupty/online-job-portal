<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Category;
use App\Models\SeekerEducation;
use App\Models\SeekerExperience;
use App\Models\SeekerExpert;
use App\Models\SeekerReference;
use App\Models\User;
use Illuminate\Http\Request;


class SeekerController extends Controller
{
    public function updateUser(Request $request)
    {
        if ($request->has('updateUser')) {
            $request->validate([
                'first_name' => 'required|max:300',
                'last_name' => 'required|max:300',
                'phone' => 'required|max:300',
                'address' => 'required|max:300',
            ]);
            $edu = User::find(auth()->id());
            $edu->first_name = $request->first_name;
            $edu->last_name = $request->last_name;
            $edu->phone = $request->phone;
            $edu->address = $request->address;
            $edu->linkedin = $request->linkedin;
            $edu->company_name = $request->company_name;
            $edu->company_email = $request->company_email;
            $edu->company_phone = $request->company_phone;
            $edu->office_address = $request->office_address;
            if (!empty($request->logo)) {
                $edu->logo = imageUpload($request->logo, 'Logo');
            }
            if (!empty($request->image)) {
                $edu->image = imageUpload($request->image, 'Image');
            }
            $edu->save();
            return back();
        }
    }

    public function addEducation(Request $request)
    {
        if ($request->has('education')) {
            $request->validate([
                'institute_name' => 'required|max:100',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date',
                'cgpa' => 'nullable|numeric|between:0,4',
                'department' => 'required'
            ]);
            if (($request->id) == null) {
                $edu = new SeekerEducation();
                $edu->user_id = auth()->id();
            } else {
                $edu = SeekerEducation::find($request->id);
            }
            $edu->institute_name = $request->institute_name;
            $edu->start_date = $request->start_date;
            $edu->end_date = $request->end_date;
            $edu->cgpa = $request->cgpa;
            $edu->department = $request->department;
            $edu->save();
            return back();
        }
    }

    public function deleteEducation($id)
    {
        $edu = SeekerEducation::find($id);
        $edu->delete();
        return back();
    }

    public function addSkill(Request $request)
    {
        if ($request->has('skill')) {
            $request->validate([
                'name' => 'required|max:150',
            ]);
            $edu = new SeekerExpert();
            $edu->user_id = auth()->id();
            $edu->name = $request->name;
            $edu->save();
            return back();
        }
    }

    public function deleteSkill($id)
    {
        $edu = SeekerExpert::find($id);
        $edu->delete();
        return back();
    }

    public function addReference(Request $request)
    {
        if ($request->has('reference')) {
            $request->validate([
                'name' => 'required|max:200',
                'phone' => 'required',
                'occupation' => 'required',
                'designation' => 'required',
            ]);
            if (($request->id) == null) {
                $edu = new SeekerReference();
                $edu->user_id = auth()->id();
            } else {
                $edu = SeekerReference::find($request->id);
            }
            $edu->user_id = auth()->id();
            $edu->name = $request->name;
            $edu->phone = $request->phone;
            $edu->occupation = $request->occupation;
            $edu->designation = $request->designation;
            $edu->save();
            return back();
        }
    }

    public function deleteReference($id)
    {
        $edu = SeekerReference::find($id);
        $edu->delete();
        return back();
    }

    public function deleteExperience($id)
    {
        $edu = SeekerExperience::find($id);
        $edu->delete();
        return back();
    }

    public function addExperience(Request $request)
    {
        if ($request->has('experience')) {
            $request->validate([
                'company_name' => 'required|max:200',
                'designation' => 'required',
                'from_date' => 'required|date',
                'to_date' => 'nullable|date',
            ]);
            if (($request->id) == null) {
                $edu = new SeekerExperience();
                $edu->user_id = auth()->id();
            } else {
                $edu = SeekerExperience::find($request->id);
            }
            $edu->company_name = $request->company_name;
            $edu->designation = $request->designation;
            $edu->from_date = $request->from_date;
            $edu->to_date = $request->to_date;
            $edu->save();
            return back();
        }
    }

    public function myJobApplication()
    {
        $data['categories'] = Category::all();
        $data['datas'] = Apply::with('job','job.user')->where('user_id', auth()->id())->get();
        return view('job-application', $data);
    }
    public function companydetails($id)
    {
        $data['company'] = User::find($id);
        return view('company-details',$data);
    }
}
