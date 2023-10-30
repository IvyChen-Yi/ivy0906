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
         <td><input type="text" name="name" ></td>
      </tr>
      @error('name')
       <div class="text-danger">{{ $message }}</div>
       @enderror
      <tr>
         <th>メール</th>
         <td><input type="text" name="email"  ></td>
      </tr>
      @error('email')
       <div class="text-danger">{{ $message }}</div>
       @enderror
       <tr>
         <th>パスワード</th>
         <td><input type="password" name="password"  ></td>
      </tr>
      @error('password')
       <div class="password">{{ $message }}</div>
       @enderror
       
      <tr>
         <th>権限</th>
         <td>    
            <input type="radio" name="role"  value="1" >管理者
            <input type="radio" name="role"  value="0" >利用者     
       @error('role')
       <div class="text-danger">{{ $message }}</div>
       @enderror    
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