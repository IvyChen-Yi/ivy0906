@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')


@stop
@section('content')
    <title>ユーザー一覧画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="text-align:center">
    <h1>ユーザー一覧画面</h1>
    <a href="/user/add" class="btn btn-primary">新規登録</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メール</th>
            <th>権限</th>
            <th>編集</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->role==0) 利用者 @else 管理者 @endif</td>
            <td><a href="/user/edit/{{$user->id}}" class="btn btn-primary btn-sm">編集</a></td>
        </tr>
        @endforeach
    </table>
</div>
</body>
@stop

@section('css')
@stop

@section('js')
@stop

</html>