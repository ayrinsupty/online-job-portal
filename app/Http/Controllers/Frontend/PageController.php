<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Job;
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

            $data['jobs'] = Job::where('application_last_date', '>=', now())->where('title', 'LIKE', '%' .$search . '%')->get();
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

    public function apply($id)
    {
        if (Apply::where('user_id', auth()->id())->where('job_id', $id)->first()) {
        } else {
            $apply = new Apply();
            $apply->user_id = auth()->id();
            $apply->job_id = $id;
            $apply->user_id = auth()->id();
            $apply->save();
        }
        return back()->with('success','Application Successfully Accepted');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
