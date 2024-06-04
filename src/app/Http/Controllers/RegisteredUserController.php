<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\Time;
use App\Models\User;
use App\Models\BreakTime;
use Carbon\Carbon;
use DateTime;

class RegisteredUserController extends Controller
{
    public function stamp()
    {
        $date = new DateTime();
        return view('stamp');
    }

    public function start()
    {
        $user_id = Auth::id();
        $datetime = new DateTime();
        $date = $datetime->format('Y-m-d');
        $record = Time::create([
            'user_id' => $user_id,
            'date' => $date,
            'start_time' => $datetime,
        ]);
        $times_id = $record->id;
        return view('stamp')->with('times_id',$times_id);
    }
    public function break_start(Request $request)
    {
        $times_id = $request->input('start_time');
        $break_start = new DateTime();
        $record = BreakTime::create([
            'time_id' => $times_id,
            'break_start' => $break_start,
        ]);
        $id = $record->id;
        return view('stamp')->with('break_time_id',$id);
    }
    public function break_end(Request $request)
    {
        $break_time_id = $request->input('end_time');
        $break_end = new DateTime();
        $record = BreakTime::where('id',$break_time_id)->get();
        $time_id = $record[0]['time_id'];
        $break_start = $record[0]['break_start'];
        $break_start = new Carbon($break_start);
        $break_end = new Carbon($break_end);
        $break_time = $break_start->diffInSeconds($break_end);
        $hours = floor($break_time / 3600);
        $minutes = floor(($break_time % 3600) / 60);
        $seconds = $break_time % 60;
        $time = new DateTime();
        $time = $time->setTime($hours,$minutes,$seconds,);
        // $new_time = $time->format('H:i:s');
        BreakTime::where('id',$break_time_id)->update(
            [
                'break_end' => $break_end,
                'break_time' => $time,
            ]);
        return view('stamp')->with('times_id',$time_id);
    }
    public function end(Request $request)
    {
        $time_id = $request->input('end_time');
        $record = Time::where('id',$time_id)->get();
        $start_time = new Carbon($record[0]['start_time']);
        $end_time = new Carbon();
        $work_time = $start_time->diffInSeconds($end_time);
        $hours = floor($work_time / 3600);
        $minutes = floor(($work_time % 3600) / 60);
        $seconds = $work_time % 60;

        $work_time = new DateTime();
        $work_time = $work_time->setTime($hours,$minutes,$seconds,);
        $break_times = BreakTime::where('time_id',$time_id)->get('break_time');
        $total_break_time = 0;
        foreach ($break_times as $break_time){
            $conversion = new Carbon($break_time->break_time);
            $total_break_time += $conversion->hour * 3600 + $conversion->minute * 60 + $conversion->second;
        }
        $hours = floor($total_break_time / 3600);
        $minutes = floor(($total_break_time % 3600) / 60);
        $seconds = $total_break_time % 60;
        $break_total = new DateTime();
        $break_total = new Carbon($break_total->setTime($hours,$minutes,$seconds,));
        $work_time = new Carbon($work_time);
        $work_time = $work_time->diffInSeconds($break_total);
        $hours = floor($work_time / 3600);
        $minutes = floor(($work_time % 3600) / 60);
        $seconds = $work_time % 60;
        $time = new DateTime();
        $work_time = new Carbon($time->setTime($hours,$minutes,$seconds,));
        $work_time = $work_time->format('H:i:s');
        $break_total = $break_total->format('H:i:s');
        Time::where('id',$time_id)->update(
            [
                'end_time' => $end_time,
                'break_time' => $break_total,
                'work_time' => $work_time,
            ]);
        return redirect('/');
    }
}