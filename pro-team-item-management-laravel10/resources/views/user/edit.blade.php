@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')


@stop
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>ユーザー編集画面</title>
 </head>
 <body>
   <div class="container" style="text-align:center">
   <h1>ユーザー編集画面</h1>
    <a href="/user" >戻る</a>
   <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">

    <form action="/user/update/{{$user->id}}" method="POST">
      @csrf
    <table class="table" style="text-align:center" >
      <tr>
         <th>ID</th>
         <td>{{$user->id}}</td>
      </tr>
      <tr>
         <th>名前</th>
         <td><input type="text" name="name" value="{{$user->name}}" ></td>
         @error('name')
       <div class="text-danger">{{ $message }}</div>
       @enderror
      </tr>
      <tr>
         <th>メール</th>
         <td><input type="text" name="email" value="{{$user->email}}" ></td>
         @error('email')
       <div class="text-danger">{{ $message }}</div>
       @enderror
      </tr>
      <tr>
         <th>権限</th>
         <td>
            <input type="radio" name="role"  value="1" @if($user -> role==1) checked @endif>管理者
            <input type="radio" name="role"  value="0" @if($user -> role==0) checked @endif>利用者


            
      </td>
      </tr>
      
    </table>
    </div>
    </div>
    <div style="inline;text-align:center">
    <input type="hidden" name="id" value="{{$user->id}}" >
    <input type="submit" value="送信" class="btn btn-primary">

   <form method="POST" action="/user/delete/{{$user->id}}" >
        @csrf
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal" >削除</button>
  </form>
   </div>
   <!--Modal Start-->
   <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">削除の確認</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            本当にこのユーザーを削除しますか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <!-- 削除ボタンを押した際のアクションをここで実行する -->
            <form method="POST" action="/user/delete/{{$user->id}}">
            @csrf
            <!-- @method('DELETE') -->
            <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </div>
    </div>
    </div>
  <!--Modal End-->

    </div>
    </form>

    </div>

</div>
 </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

 @stop

@section('css')
@stop

@section('js')
@stop
 </html>