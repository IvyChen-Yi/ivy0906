
@extends('adminlte::page')

@section('title', '注文編集')

@section('content_header')
    
    <h1 align="center">注文編集</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@stop

@section('content')
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">

<form method="POST" action="/item/OrderUpdate/{{$order->p_id}}">
@csrf
<div class="card-body">
  <div class="form-group">
   <label for="p_id">商品番号</label>
   <p name="p_id">{{$order->p_id}}</p>
  </div>

<div class="card-body">
  <div class="form-group">
   <label for="p_name">商品名</label>
    <input type="text" class="form-control" id="p_name" name="p_name" value="{{ old('p_name', $order->p_name)}}">
    @error('p_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
  </div>


    <div class="form-group">
      <label for="p_stock">発注数量</label>
      <input type="text" class="form-control" id="p_stock" name="p_stock" value="{{old('p_stock', $order->p_stock)}}">
      @error('p_stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
    </div>

    <div class="form-group">
      <label for="p_date">入荷予定日</label>
      <input type="date" class="form-control" id="p_date" name="p_date" value="{{old('p_date', $order->p_date)}}">
      @error('p_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
    </div>


    <div class="form-group">
      <label for="p_order">注文者</label>
      <p name="p_order">{{\Auth::user()->name}}</p>

    </div>
</div>
 
</div>
<div class="row justify-content-center">
  <div class="btn-group" >

   <div class="card-footer">
    <button type="submit" class="btn btn-primary" >修正する</button>
   </div>
</form>
<div class="card-footer">
   <form method="POST" action="/item/OrderDestroy/{{$order->p_id}}" >
        @csrf
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#OrderModal" >削除</button>
  </form>
   </div>
   <!--Modal Start-->
   <div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">削除の確認</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            本当にこの注文を削除しますか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <!-- 削除ボタンを押した際のアクションをここで実行する -->
            <form method="POST" action="/item/OrderDestroy/{{$order->p_id}}">
            @csrf
            <!-- @method('DELETE') -->
            <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </div>
    </div>
    </div>
  <!--Modal End-->

   <div class="card-footer">
    <a href="/item"><button type="submit" class="btn btn-primary" >商品一覧に戻る</button></a>
   </div>


  </div>

</div>



</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

@stop

@section('css')
@stop

@section('js')
@stop