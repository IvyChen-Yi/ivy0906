@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>


@stop
@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card card-primary">
                <form method="POST" action="/item/store">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type">
                                <option value=""   @if(old('type') == '') selected @endif> </option>
                                <option value="1"  @if(old('type') == '1') selected @endif>洗顔</option>
                                <option value="2"  @if(old('type') == '2') selected @endif>化粧水</option>
                                <option value="3"  @if(old('type') == '3') selected @endif>美容液</option>
                                <option value="4"  @if(old('type') == '4') selected @endif>乳液・クリーム</option>
                                <option value="5"  @if(old('type') == '5') selected @endif>マスク</option>
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="series">シリーズ</label>
                            <select class="form-control" id="series" name="series" value="{{ old('series') }}">
                                <option value=""    @if(old('series') == '') selected @endif></option>
                                <option value="91"  @if(old('series') == '91') selected @endif>基礎シリーズ</option>
                                <option value="92"  @if(old('series') == '92') selected @endif>美白シリーズ</option>
                                <option value="93"  @if(old('series') == '93') selected @endif>エイジングケアシリーズ</option>
                            </select>
                            @error('series')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                            @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="manufactured_date">製造年月日</label>
                            <input type="date" class="form-control" id="manufactured_date" name="manufactured_date" value="{{ old('manufactured_date') }}">
                            @error('manufactured_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">有効期限</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}">
                            @error('expiry_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea class="form-control" id="detail" name="detail" >{{ old('detail') }}</textarea>
                            @error('detail')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="btn-group">

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >登録</button>
                    </div>
                    <div class="card-footer">
                        <a href="{{url()->previous()}}"><button type="submit" class="btn btn-primary" >前のページに戻る</button></a>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
