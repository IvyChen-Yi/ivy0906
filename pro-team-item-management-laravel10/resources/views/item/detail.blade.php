
@extends('adminlte::page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@section('title', '商品登録')

@section('content_header')
    <h1 align="center">商品詳細</h1>

@stop

@section('content')

<div class="row justify-content-center">
        <div class="col-6 ">
        <div class="card">

<table class="table table-hover text-nowrap" >
  <tr>
    <th>商品番号</th>
    <td>{{$item->id}}</td>
  </tr>
  <tr>
    <th>商品名</th>
    <td>{{$item->name}}</td>
  </tr>
  <tr>
    <th>種別</th>
    <td> 
        @switch($item->type)
        @case(1)
        洗顔 @break
        @case(2)
        化粧水@break
        @case(3)
        美容液@break
        @case(4)
        乳液．クリーム@break
        @case(5)
        マスク @break
        @endswitch
    </td>
  </tr>
  <tr>
    <th>シリーズ</th>
    <td>
    @switch($item->series)
    @case(91)
    基礎シリーズ @break
    @case(92)
    美白シリーズ @break
    @case(93)
    エイジングケアシリーズ @break
    @endswitch
    </td>
  </tr>
  <tr>
    <th>在庫数</th>
    <td>{{$item->stock}}</td>
  </tr>
  <tr>
    <th>製造年月日</th>
    <td>{{$item->manufactured_date}}</td>
  </tr>
  <tr>
    <th>有効期限</th>
    <td>{{$item->expiry_date}}</td>
  </tr>
  <tr>
    <th >商品詳細</th>
    <td>{!!nl2br(e($item->detail))!!}</td>
  </tr>

</table>


</div>


</div>
</div>
<div class="text-center">
  <div class="btn-group" >

   <div class="card-footer">
    <a href="/items/edit/{{$item->id}}"><button type="submit" class="btn-group btn-primary" >修正する</button></a>
   </div>

   <div class="card-footer">
    <a href="/items/edit/{{$item->id}}"><button type="submit" class="btn-group btn-primary" >削除する</button></a>
   </div>

   <div class="card-footer">
   <button type="button" class="btn-group btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">注文する</button>
   </div>

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

@stop
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

@section('css')
@stop

@section('js')
@stop
 

