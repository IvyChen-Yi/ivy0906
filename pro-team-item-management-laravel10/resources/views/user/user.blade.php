@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
    <h1 class="text-center">ユーザー管理</h1>
@stop

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>ユーザー管理</title>
</head>
<body>
<div class="d-flex justify-content-center">

<table class="table table-striped col-10 ">
  <thead >
    <tr>
      <th scope="col">名前</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">権限</th>
      <th scope="col">
        <div class="input-group input-group-sm">
        <div class="input-group-append">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#UserModal" data-bs-whatever="@mdo">新規登録</button>
        </div>
        </div>

        <!--Modal-->


<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="UserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UserModalLabel">新規登録</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="u-name" class="col-form-label">名前</label>
            <input type="text" class="form-control" id="u-name">
          </div>
          <div class="mb-3">
            <label for="u-mail" class="col-form-label">メールアドレス</label>
            <input type="email" class="form-control" id="u-mail">
          </div>
          <div class="mb-3">
            <label for="u_limit" class="col-form-label">権限</label>
            <br>
            <input type="radio" name="u-limit" id=p0 value=0>
            <label for="u_limit">管理者</label>
            <input type="radio" name="u-limit" id=p1 value=1>
            <label for="u_limit">使用者</label>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
        <a href="{{url('orders')}}"><button type="button" class="btn btn-primary">送信</button></a>
      </div>
    </div>
  </div>
</div>
<!--Modal-->
</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($items as $item)
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->mail}}</td>
      <td>{{$item->p_stock}}</td>
      <td><a href="{{url('/edit/{id}')}}"><button class="btn btn-outline-secondary">編集</button></a></td>
      @endforeach
    </tr>

  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</div>
</body>
@stop

@section('css')
@stop

@section('js')
@stop
