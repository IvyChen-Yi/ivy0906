@extends('adminlte::page')

@section('title', '注文管理')

@section('content_header')
    <h1>注文管理</h1>
@stop

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>注文管理</title>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">商品番号</th>
      <th scope="col">商品名</th>
      <th scope="col">発注数量</th>
      <th scope="col">入荷予定日</th>
      <th scope="col">注文者</th>
      <th scope="col">
       <div class="input-group input-group-sm">
        <div class="input-group-append">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">注文登録</button>
        </div>
        </div>
        <!--Modal-->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">発注記入票</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="p_id" class="col-form-label">商品番号</label>
            <input type="text" class="form-control" id="p_id">
          </div>
          <div class="mb-3">
            <label for="p_name" class="col-form-label">商品名</label>
            <textarea class="form-control" id="p_name"></textarea>
          </div>
          <div class="mb-3">
            <label for="p_stock" class="col-form-label">発注数量</label>
            <input type="number" class="form-control" id="p_stock">
          </div>
          <div class="mb-3">
            <label for="p_date" class="col-form-label">入荷予定日</label>
            <input type="date" class="form-control" id="p_date">
          </div>
          <div class="mb-3">
            <label for="p_order" class="col-form-label">注文者</label>
            <input type="text" class="form-control" id="p_order">
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
      <th scope="row">{{$item->p_id}}</th>
      <td>{{$item->p_name}}</td>
      <td>{{$item->p_stock}}</td>
      <td>{{$item->p_date}}</td>
      <td>{{$item->p_order}}</td>
      <td><a href="{{url('/edit/{id}')}}"><button class="btn btn-outline-secondary">編集</button></a></td>
      @endforeach
    </tr>

  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
@stop

@section('css')
@stop

@section('js')
@stop
