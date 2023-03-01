<?php

use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

function getData($model)
{
    $model = "\App\Models" . $model;
    // return app($model)->where('is_active',1)->orderBy('serialize','asc');
    return app($model)->all();
}

function phoneNoRegex()
{
    return "/^(?=.{11}$)(01[3-9])\d+$/"; // [3-9] for BD phone no
}

function redirectRouteHelper($route = null)
{
    if ($route == null) {
        Alert::toast('Something went wrong Try again !', 'error')->timerProgressBar();
        return back();
    } else {
        Alert::toast('Successfully Created !', 'success')->timerProgressBar();
        return redirect()->route($route);
    }
}

function redirectRouteHelperWithParams($route = null, $params = null)
{
    if ($route == null) {
        Alert::toast('Something went wrong Try again !', 'error')->timerProgressBar();
        return back();
    } else {
        Alert::toast('Successfully Created !', 'success')->timerProgressBar();
        return redirect()->route($route, $params);
    }
}


function imageUpload($file, $file_path = null)
{
    $file_name = $file_path . '/' . time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('images/' . $file_path . '/'), $file_name);
    return $file_name;
}

function removeOldImage($file)
{
    unset($file);
}

function dateTimeformat($datetime)
{
    return Carbon::parse($datetime)->format('j F, Y | H:i:s A');
}

function duration($time_begin, $time_end)
{
    $today_check_in = Carbon::parse($time_begin);
    $check_out = Carbon::parse($time_end);
    return $today_check_in->diff($check_out)->format('%H:%I:%S');
}

function mytime()
{
    return (Carbon::now(env('MY_TIMEZONE')))->toDateTimeString();
}


