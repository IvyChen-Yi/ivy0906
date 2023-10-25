@extends('adminlte::page')

@section('title', 'ユーザー新規登録')

@section('content_header')


@stop
@section('content')
    <title>ユーザー新規登録画面</title>
 </head>
 <body>
   <div class="container" style="text-align:center">
    <h1>ユーザー新規登録画面</h1>
   <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">

    <form action="/user/store" method="POST">
      @csrf
    <table class="table" style="text-align:center" >
      
      <tr>
         <th>名前</th>
         <td><input type="text" name="name"  required></td>
      </tr>
      <tr>
         <th>メール</th>
         <td><input type="text" name="email"  required></td>
      </tr>
      <tr>
         <th>権限</th>
         <td>    
            <input type="radio" name="role" required value="1" >管理者
            <input type="radio" name="role" required value="0" >利用者          
      </td>
      </tr>
      
    </table>
    </div>
    </div>
    
    </div>
    
    <input type="submit" value="送信" class="btn btn-primary">
    </form>
    </div>
    </div>
    
    </div>
</div>
    

 </body>
 @stop

@section('css')
@stop

@section('js')
@stop
 </html>