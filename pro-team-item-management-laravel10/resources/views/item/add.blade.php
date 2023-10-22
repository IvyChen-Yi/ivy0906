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
                <form method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type">
                                <option value="1">洗顔</option>
                                <option value="2">化粧水</option>
                                <option value="3">美容液</option>
                                <option value="4">乳液・クリーム</option>
                                <option value="5">マスク</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="series">シリーズ</label>
                            <select class="form-control" id="series" name="series">
                                <option value="91">基礎シリーズ</option>
                                <option value="92">美白シリーズ</option>
                                <option value="93">エイジングケアシリーズ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        </div>

                        <div class="form-group">
                            <label for="manufactured_date">製造年月日</label>
                            <input type="date" class="form-control" id="manufactured_date" name="manufactured" placeholder="製造年月日">
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">有効期限</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry" placeholder="有効期限">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
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
