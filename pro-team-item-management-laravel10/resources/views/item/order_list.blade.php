@extends('adminlte::page')

@section('title', '注文管理')

@section('content_header')
    <h1>注文管理</h1>
@stop

@section('content')
    <title>注文管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
@if(session('success'))
<div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert" style="max-width: 500px;margin: 0 auto;margin-top: 10px;">
        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img" aria-label="成功:"><use xlink:href="#check-circle-fill"/>
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="閉じる"></button>
            {{ session('success') }}
        </div>
    @endif
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
        <a href='/item/OrderAdd'><button type="button" class="btn btn-outline-secondary">注文登録</button></a>
        </div>
        </div>
       
    </th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order_list => $order)
    <tr>
      <th scope="row">{{ $order-> p_id}}</th>
      <td>{{$order->p_name}}</td>
      <td>{{$order->p_stock}} </td>
      <td>{{$order->p_date}} </td>
      <td>{{$order->p_order}} </td>

      <td><a href='/item/OrderEdit/{{$order->p_id}}'><button class="btn btn-outline-secondary">編集</button></a></td>
    </tr>
    @endforeach

  </tbody>
</table>
<div class="pagination justify-content-center">
    {{ $orders->links('pagination::bootstrap-4') }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
@stop

@section('css')
@stop

@section('js')
@stop
