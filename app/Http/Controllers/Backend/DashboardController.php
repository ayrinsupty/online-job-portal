<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;
    public $pageHeader;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
        $this->pageHeader = [
            'title' => "Dashboard",
            'sub_title' => "",
            'plural_name' => "dashboards",
            'index_button' => "admin.dashboards.index",
            'create_button' => "admin.dashboards.index"
        ];
    }


    public function index()
    {
        if(Auth::guard('web')->check()!='true'){
            return redirect('/login');
        }
        $pageHeader = $this->pageHeader;

        return view('backend.pages.dashboard.index',compact('pageHeader'));
    }
}
