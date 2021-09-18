<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daily_attendance_tbl;
use Auth;
use Carbon\Carbon;

class attendance_controller extends Controller
{
    public function daily_attendance_checkin()
    {
        $name = Auth::user()->f_name." ".Auth::user()->l_name;
        $id = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $today_checkin = daily_attendance_tbl::where('in_time', 'rlike', $date)->where('remove_status', '0')->count();
        if ($today_checkin > 0) 
        {
            return response()->json(['error'=>'Attendance already added..!']);
        }

        $checkin[] = array(
            'user_id' => $id,
            'in_time' => $datetime,
            'out_time' => $datetime,
            'status' => 'CheckIn',
        );

        daily_attendance_tbl::insert($checkin);

        return response()->json(['success'=>'Your attendance update successfully..!']);
    }

    public function daily_attendance_checkout()
    {
        $name = Auth::user()->f_name." ".Auth::user()->l_name;
        $id = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $today_checkin = daily_attendance_tbl::where('in_time', 'rlike', $date)->where('remove_status', '0')->count();

        if ($today_checkin < 0) 
        {
            return response()->json(['error'=>'Please check in your attendance..!']);
        }
        elseif ($today_checkin > 1) {
            return response()->json(['error'=>'Something wrong. Please contact your administrator..!']);
        }
        elseif ($today_checkin == 1) {

            $id = daily_attendance_tbl::where('in_time', 'rlike', $date)->where('remove_status', '0')->first()->value('id');

            $find_datetime = daily_attendance_tbl::find($id);
            $find_datetime->out_time = $datetime;
            $find_datetime->update();

            return response()->json(['success'=>'Your attendance update successfully..!']);
        }

       
    }

    public function shift_summery()
    {
        $year = date('Y');
        $month = date('m');
        $currentDate = Carbon::now();

        // current week
        $month = daily_attendance_tbl::whereYear('in_time', '=', $year)->whereMonth('in_time', '=', $month)->get();
        $current_week = daily_attendance_tbl::where('in_time', '>', Carbon::now()->startOfWeek())
            ->where('in_time', '<', Carbon::now()->endOfWeek())
            ->get();
        $current_week_perantage = count($current_week) /7 * 100;

        // last week
        $last_week_date = Carbon::today()->subDays(7);
        $last_week = daily_attendance_tbl::where('in_time','>=',$last_week_date)->get();
        $last_week_perantage = count($current_week) /7 * 100;

        // last month
        $last_month_start = new Carbon('first day of last month');
        $last_month_end = new Carbon('last day of last month');
        $last_month = daily_attendance_tbl::orderBy('in_time', 'DESC')->where('in_time', '>', $last_month_start)
        ->where('in_time', '<', $last_month_end)
        ->get();
        $last_month_end = date("j", strtotime("last day of previous month"));
        $last_month_perantage = count($current_week) /$last_month_end * 100;


        return view('shift_summery.shift_info')
        ->with('current_week', $current_week)
        ->with('current_week_perantage', $current_week_perantage)
        ->with('last_week', $last_week)
        ->with('last_week_perantage', $last_week_perantage)
        ->with('last_month', $last_month)
        ->with('last_month_perantage', $last_month_perantage);
    }

    public function find_attend_summery(Request $request)
    {
        $date = $request->date;
        $attend_in_time = daily_attendance_tbl::where('in_time', 'rlike', $date)->value('in_time');
        $attend_in_date = date("D, F j, Y", strtotime($attend_in_time));
        $attend_in_time = date("g:i a", strtotime($attend_in_time));

        $attend_out_time = daily_attendance_tbl::where('in_time', 'rlike', $date)->value('out_time');
        $attend_out_date = date("D, F j, Y", strtotime($attend_out_time));
        $attend_out_time = date("g:i a", strtotime($attend_out_time));

        $attend_count = daily_attendance_tbl::where('in_time', 'rlike', $date)->count();

        return response()->json(['success'=>'Your attendance find successfully..!', 
        'attend_in_time'=> $attend_in_time, 
        'attend_in_date'=> $attend_in_date, 
        'attend_out_time'=> $attend_out_time,
        'attend_out_date'=> $attend_out_date,
        'attend_count'=> $attend_count
        ]);
    }
}
