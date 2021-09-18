<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daily_attendance_tbl;
use App\Models\leave_tbl;
use Auth;
use Carbon\Carbon;

class leave_controller extends Controller
{
    public function time_off_home()
    {
        $year = date('Y');
        $month = date('m');
        $currentDate = Carbon::now();

        $last_year = date("Y",strtotime("-1 year"));
        $current_year = date('Y');
        $next_year = date("Y",strtotime("+1 year"));

        // current year
        $current_year_leave = leave_tbl::whereYear('date_time', '=', $current_year)->get();
        $current_year_perantage = count($current_year_leave) /365 * 100;

        // current_year seek & annual leave
        $current_year_seek_leave = leave_tbl::whereYear('date_time', '=', $current_year)->where('leave_type', 'Seek')->get();
        $current_year_annual_leave = leave_tbl::whereYear('date_time', '=', $current_year)->where('leave_type', 'Annual')->get();

        $last_year_leave = leave_tbl::whereYear('date_time', '=', $last_year)->get();
        $last_year_perantage = count($last_year_leave) /365 * 100;

        $next_year_leave = leave_tbl::whereYear('date_time', '=', $next_year)->get();
        $next_year_perantage = count($next_year_leave) /365 * 100;


        return view('time_off.time_off_home')
        ->with('current_year', $current_year)
        ->with('last_year', $last_year)
        ->with('next_year', $next_year)
        ->with('current_year_leave', $current_year_leave)
        ->with('current_year_perantage', $current_year_perantage)
        ->with('last_year_leave', $last_year_leave)
        ->with('last_year_perantage', $last_year_perantage)
        ->with('next_year_leave', $next_year_leave)
        ->with('next_year_perantage', $next_year_perantage)
        ->with('current_year_seek_leave', $current_year_seek_leave)
        ->with('current_year_annual_leave', $current_year_annual_leave)
        ;
    }

    public function submit_seek_leave(Request $request)
    {
        $lev_date = $request->lev_date;
        $lev_reason = $request->lev_reason;

        $name = Auth::user()->f_name." ".Auth::user()->l_name;
        $user_id = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $add_seek_leave[] = array(
            'user_id' => $user_id,
            'leave_date' => $lev_date,
            'leave_type' => 'Seek',
            'leave_reason' => $lev_reason,
            'status' => 'Pending',
            'date_time' => $datetime
        );

        leave_tbl::insert($add_seek_leave);

        return response()->json(['success'=>'Seek leave apply successfully..!']);
    }

    public function submit_annual_leave(Request $request)
    {
        $lev_date = $request->lev_date_annual;
        $lev_reason = $request->lev_reason_annual;

        $name = Auth::user()->f_name." ".Auth::user()->l_name;
        $user_id = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $add_annuak_leave[] = array(
            'user_id' => $user_id,
            'leave_date' => $lev_date,
            'leave_type' => 'Annual',
            'leave_reason' => $lev_reason,
            'status' => 'Pending',
            'date_time' => $datetime
        );

        leave_tbl::insert($add_annuak_leave);

        return response()->json(['success'=>'Annual leave apply successfully..!']);
    }
}
