<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class AttendanceController extends Controller
{
    // 日付一覧ページの表示
    public function index(Request $request)
    {
        $date = $request->input('date');
        if(isset($date)){
            // 値が入っている（日付の進む、戻るを選択した）時の処理
            $today = Carbon::parse($date);
            // 取り出した日付をCarbonで取得
            $yesterday = $today->copy()->subDay(1)->format('Y/m/d');
            $tomorrow = $today->copy()->addDay(1)->format('Y/m/d');
            // 取り出した日付の前後をそれぞれ取得
            $records = Time::where('date', [$date])->paginate(5);
            // 最初に取り出した日付に該当するレコードを取り出す
        }else{
            // 値が入っていない（最初に日付一覧ページにアクセスした）時の処理
            $today = Carbon::today();
            // 本日の日付をCarbonで取得
            $yesterday = $today->copy()->subDay(1)->format('Y/m/d');
            $tomorrow = $today->copy()->addDay(1)->format('Y/m/d');
            // 取得した日付の前後をそれぞれ取得
            $date = $today->format('Y/m/d');
            // 本日の日付をフォーマット指定して取得
            $records = Time::where('date', [$date])->paginate(5);
            // 本日の日付に該当するレコードを取り出す
        };

        return view('attendance',compact('records','date','yesterday','tomorrow'));
    }

}
