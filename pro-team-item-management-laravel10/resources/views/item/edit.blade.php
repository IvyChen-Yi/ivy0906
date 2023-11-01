
@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    
    <h1 align="center">商品編集</h1>
@stop

@section('content')
<div class="row justify-content-center">
<div class="col-md-6">
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif
<div class="card">

<form method="POST" action="/item/update/{{$item->id}}">
@csrf

<div class="card-body">
  <div class="form-group">
   <label for="name">商品名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$item->name) }}">
    @error('name')
    <div class="text-danger">{{ $message }}</div>
     @enderror
  </div>

   <div class="form-group">
     <label for="type">種別</label>
      <select class="form-control" id="type" name="type">
      @foreach([0=>'', 1 => '洗顔', 2 => '化粧水', 3 => '美容液', 4 => '乳液．クリーム', 5 => 'マスク',] as $value => $label)

       <option value="{{ $value }}" {{ old('type', $item->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
       @endforeach

        </select>
        @error('type')
        <div class="text-danger">{{ $message }}</div>
        @enderror
   </div>

    <div class="form-group">
      <label for="series">シリーズ</label>
      <select class="form-control" id="series" name="series">
      @foreach([01=>'', 91 => '基礎シリーズ', 92 => '美白シリーズ', 93 => 'エイジングケアシリーズ',] as $value => $label)

      <option value="{{ $value }}" {{ old('series', $item->series) == $value ? 'selected' : '' }}>{{ $label }}</option>
      @endforeach

        
      </select>
      @error('series')
        <div class="text-danger">{{ $message }}</div>
        @enderror
</div>

    <div class="form-group">
      <label for="stock">在庫数</label>
      <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock',$item->stock)}}">
      @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
    </div>

    <div class="form-group">
      <label for="manufactured_date">製造年月日</label>
      <input type="date" class="form-control" id="manufactured_date" name="manufactured_date" value="{{old('manufactured_date',$item->manufactured_date)}}">
      @error('manufactured_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
      <label for="expiry_date">有効期限</label>
      <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{old('expiry_date',$item->expiry_date)}}">
      @error('expiry_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
      <label for="detail">商品詳細</label>
      <textarea type="text" class="form-control" id="detail" name="detail" >{{old('detail',$item->detail)}}</textarea>
      @error('detail')
        <div class="text-danger">{{ $message }}</div>
        @enderror
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
    <a href="/item"><button type="submit" class="btn btn-primary" >商品一覧に戻る</button></a>
   </div>


  </div>

</div>



</div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop