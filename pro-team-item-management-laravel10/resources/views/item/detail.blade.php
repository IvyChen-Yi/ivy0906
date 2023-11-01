
@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1 align="center">商品詳細</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
    <a href="
    @if ($user->role==1)
    /item/edit/{{$item->id}}
    @else
    {{url('item')}}
    @endif
    "><button type="submit" class="btn-group btn-primary" >修正</button></a>
   </div>

   <div class="card-footer">
   <form method="POST" action="/item/destroy/{{$item->id}}" >
        @csrf
        @if ($user->role==1)
        <button type="button" class="btn-group btn-primary"data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
        @else
        <a href="{{url('item')}}"><button type="button" class="btn-group btn-primary">削除</button></a>
        @endif
  </form>
   </div>
   <div class="card-footer">
        <a href="{{url()->previous()}}"><button type="submit" class="btn-group btn-primary" >前のページに戻る</button></a>
        </div>
   <!--Modal Start-->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">削除の確認</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            本当にこの商品を削除しますか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <!-- 削除ボタンを押した際のアクションをここで実行する -->
            <form method="POST" action="/item/destroy/{{$item->id}}">
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
</div>
<!-- Bootstrap5 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


@stop

@section('css')
@stop

@section('js')
@stop
 

