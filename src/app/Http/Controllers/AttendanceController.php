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
    public function index()
    {
        $today = Carbon::today();
        // 今日の日付をCarbonで取得
        $date = $today->format('Y/m/d');
        // blade側で日付を出すためCarbonインスタンスをフォーマットする。
        $records = Time::where('date', [$date])->paginate(5);
        // 今日の日付をwhereで絞り込み検索を行い、ペジネーション取得する
        return view('attendance',compact('records','date'));
    }

    // 日付一覧ページの前日ボタンが押された時の処理
    public function return(Request $request)
    {
        if(isset($today)){
        // ペジネーションのリンクが押された時に行われる処理（日付の値を保持する目的）
            $records = Time::where('date',[$today])->paginate(5);
            return view('attendance',compact('records','date'));
        }else{
        // 日付横のボタンが押された時に行われる処理
        $today = $request->input('return');
        $today = Carbon::parse($today);
        $yesterday = $today->subDays(1);
        $date = $yesterday->format('Y/m/d');
        $records = Time::where('date', [$date])->paginate(5);
        return view('attendance',compact('records','date'));
        }
    }

    // 日付一覧ページの翌日ボタンが押された時の処理
    public function advance(Request $request)
    {
        $today = $request->input('advance');
        $today = Carbon::parse($today);
        $tomorrow = $today->addDays(1);
        $date = $tomorrow->format('Y/m/d');
        $records = Time::where('date',[$date])->paginate(5);
        return view('attendance',compact('records','date'));
    }


}
