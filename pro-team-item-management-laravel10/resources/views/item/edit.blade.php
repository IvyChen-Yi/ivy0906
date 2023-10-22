
@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    
    <h1 align="center">商品詳細</h1>
@stop

@section('content')
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">

<form method="POST">
@csrf

<div class="card-body">
  <div class="form-group">
   <label for="name">商品名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$item->name) }}">
  </div>

   <div class="form-group">
     <label for="type">種別</label>
      <select class="form-control" id="type" name="type">
      @foreach([1 => '洗顔', 2 => '化粧水', 3 => '美容液', 4 => '乳液．クリーム', 5 => 'マスク',] as $value => $label)

       <option value="{{ $value }}" {{ old('type', $item->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
       @endforeach

        </select>
        
   </div>

    <div class="form-group">
      <label for="series">シリーズ</label>
      <select class="form-control" id="series" name="series">
      @foreach([91 => '基礎シリーズ', 92 => '美白シリーズ', 93 => 'エイジングケアシリーズ',] as $value => $label)

      <option value="{{ $value }}" {{ old('series', $item->series) == $value ? 'selected' : '' }}>{{ $label }}</option>
      @endforeach

        
      </select>
</div>

    <div class="form-group">
      <label for="stock">在庫数</label>
      <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock',$item->stock)}}">
    </div>

    <div class="form-group">
      <label for="manufactured_date">製造年月日</label>
      <input type="date" class="form-control" id="manufactured_date" name="manufactured" value="{{old('manufactured',$item->manufactured)}}">
    </div>

    <div class="form-group">
      <label for="expiry_date">有効期限</label>
      <input type="date" class="form-control" id="expiry_date" name="expiry" value="{{old('expiry',$item->expiry)}}">
    </div>

    <div class="form-group">
      <label for="detail">商品詳細</label>
      <input type="text" class="form-control" id="detail" name="detail" value="{{old('detail',$item->detail)}}">
    </div>
</div>
 
</div>
<div class="row justify-content-center">
  <div class="btn-group" >

   <div class="card-footer">
    <a href="/items/edit/{{$item->id}}"><button type="submit" class="btn btn-primary" >修正する</button></a>
   </div>

   <div class="card-footer">
    <a href="/items"><button type="submit" class="btn btn-primary" >商品一覧に戻る</button></a>
   </div>


  </div>
</div>

</form>


</div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop