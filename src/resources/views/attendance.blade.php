@extends('layouts.app')

@section('link')

<div class="header__link">
    <nav class="header__link-nav">
        <ul>
            <li><a href="#">ホーム</a></li>
            <li><a href="#">日付一覧</a></li>
            <li><a href="#">ログアウト</a></li>
        </ul>
    </nav>
</div>

@endsection

@section('content')

<div class="attendance">
    <div class="attendance__time">
        <form action="attendance" method="get">
        @csrf
            <button type="submit" name="date" value="{{ $yesterday }}"><</button>
        </form>
        <p>{{ $date }}</p>
        <form action="attendance" method="get">
        @csrf
            <button type="submit" name="date" value="{{ $tomorrow }}">></button>
        </form>
    </div>
    <div class="attendance__record">
        <table class="attendance__table">
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($records as $record)
            <tr>
                <td>{{$record['user']['name']}}</td>
                <td>{{$record['start_time'];}}</td>
                <td>{{$record['end_time']}}</td>
                <td>{{$record['break_time']}}</td>
                <td>{{$record['work_time']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $records->appends(['date' => $date])->links() }}
    </script>
</div>

@endsection