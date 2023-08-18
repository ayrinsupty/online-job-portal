<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Job;
use App\Models\SeekerEducation;
use App\Models\SeekerExperience;
use App\Models\SeekerExpert;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $data['categories'] = Category::all();
        if ($search = (\request()->query('search'))) {

            $data['jobs'] = Job::where('application_last_date', '>=', now())->where('title', 'LIKE', '%' . $search . '%')->get();
        } elseif ($categoryId = (\request()->query('categoryId'))) {

            $data['jobs'] = Job::where('application_last_date', '>=', now())->where('category_id', $categoryId)->get();
        } else {
            $data['jobs'] = Job::where('application_last_date', '>=', now())->get();
        }
        return view('home', $data);
    }

    public function jobDetails($id)
    {
        $data['categories'] = Category::all();
        $data['jobDetails'] = Job::with('applicant')->find($id);
        return view('job-details', $data);
    }

    public function apply(Request $request, $id)
    {
        if (Apply::where('user_id', auth()->id())->where('job_id', $id)->first()) {
            return back()->with('error', 'Application Already Accepted');
        } else {
            if (auth()->user()->image == null) {
                return redirect()->route('dashboard')->with('error', 'Please upload your image');
            }elseif(SeekerExpert::where('user_id',auth()->id())->count()<1){
                return redirect()->route('dashboard')->with('error', 'Please upload your Skill');
            }elseif(SeekerEducation::where('user_id',auth()->id())->count()<1){
                return redirect()->route('dashboard')->with('error', 'Please upload your Education');
            } else {
                $apply = new Apply();
                $apply->user_id = auth()->id();
                $apply->job_id = $id;
                $apply->expect_salary = $request->expect_salary;
                $apply->user_id = auth()->id();
                $apply->save();
            }

        }
        return back()->with('success', 'Application Successfully Accepted');
    }

}
