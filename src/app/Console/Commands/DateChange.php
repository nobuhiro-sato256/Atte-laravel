<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Time;
use App\Models\BreakTime;
use App\Models\User;

class DateChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '日付切り変わり時、勤怠終了と勤怠開始を行う処理';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // cron実装時にCarbon::yesterdayに直す
        $end_time = Carbon::today()->setTime(23,59,59);
        $end_records = Time::whereNull('end_time')->get();
        foreach ($end_records as $record) {
            $start_time = new Carbon($record['start_time']);
            $work_time = $start_time->diffInSeconds($end_time);
            $hours = floor($work_time / 3600);
            $minutes = floor(($work_time % 3600) / 60);
            $seconds = $work_time % 60;
            $work_time = Carbon::today()->setTime($hours,$minutes,$seconds,);
            $break_times = BreakTime::where('time_id',$record['id'])->get('break_time');
            $total_break_time = 0;
                foreach ($break_times as $break_time){
                    $conversion = new Carbon($break_time->break_time);
                    $total_break_time += $conversion->hour * 3600 + $conversion->minute * 60 + $conversion->second;
                }
            $hours = floor($total_break_time / 3600);
            $minutes = floor(($total_break_time % 3600) / 60);
            $seconds = $total_break_time % 60;
            $break_total = Carbon::today()->setTime($hours,$minutes,$seconds,);
            $work_time = $work_time->diffInSeconds($break_total);
            $hours = floor($work_time / 3600);
            $minutes = floor(($work_time % 3600) / 60);
            $seconds = $work_time % 60;
            $work_time = Carbon::today()->setTime($hours,$minutes,$seconds,)->format('H:i:s');
            $break_total = $break_total->format('H:i:s');
            Time::where('id',$record['id'])->update(
            [
                'end_time' => $end_time,
                'break_time' => $break_total,
                'work_time' => $work_time,
            ]);
            // cron実装時todayに変更
            $datetime = Carbon::tomorrow();
            $date = $datetime->format('Y-m-d');
            $start_time = $datetime->format(00,00,00);
            Time::create([
                'user_id' => $record['user_id'],
                'date' => $date,
                'start_time' => $start_time,
            ]);
        }
        // $user_id = Auth::id();
        // $datetime = new DateTime();
        // $date = $datetime->format('Y-m-d');
        // $record = Time::create([
        //     'user_id' => $user_id,
        //     'date' => $date,
        //     'start_time' => $datetime,
        // ]);
        // $times_id = $record->id;
        // return view('stamp')->with('times_id',$times_id);
        // 取得したレコードの勤務終了カラムに値を代入する
        // Time::where('id',$time_id)->update(
        //     [
        //         'end_time' => $end_time,
        //         'break_time' => $break_total,
        //         'work_time' => $work_time,
        //     ]);
    }
}
