@extends('layouts.app')

@section('content')

<div class="stamp">
    <div class="stamp__comment">
        <p>おはようございます。{{ Auth::user()->name }}さん</p>
    </div>
        <div class="stamp__button">
            <div class="stamp__button-start">
                <form class="stamp_form" action="/start" method="post">
                @csrf
                @empty($user_id)
                    <button type="submit" name="start_time"  >勤務開始</button>
                @else
                    <button type="submit" name="start_time" disabled >勤務開始</button>
                @endempty
                </form>

                <form class="stamp_form" action="/end" method="post">
                @csrf
                @empty($times_id)
                    <button type="submit" name="end_time" disabled>勤務終了</button>
                @else
                    <button type="submit" name="end_time" value="{{ $times_id }}" >勤務終了</button>
                @endempty
                </form>

                <form class="stamp_form" action="/break_start" method="post" >
                @csrf
                @empty($times_id)
                    <button type="submit" name="start_time" disabled >休憩開始</button>
                @else
                    <button type="submit" name="start_time" value="{{ $times_id }}">休憩開始</button>
                @endempty
                </form>

                <form class="stamp_form" action="/break_end" method="post" >
                @csrf
                @empty($break_time_id)
                    <button type="submit" name="end_time" disabled >休憩終了</button>
                @else
                    <button type="submit"  name="end_time" value="{{ $break_time_id }}" >休憩終了</button>
                @endempty
                </form>
            </div>
        </div>
    
</div>

@endsection