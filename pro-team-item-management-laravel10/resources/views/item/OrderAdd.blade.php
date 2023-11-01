@extends('adminlte::page')

@section('title', '発注システム')

@section('content_header')
    <h1>発注システム</h1>


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
                <form method="POST" action="/item/OrderStore">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="p_id">商品番号</label>
                            <input type="text" class="form-control" id="p_id" name="p_id" >{{old('p_id')}}
                            @error('p_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="p_name">商品名</label>
                            <input type="text" class="form-control" id="p_name" name="p_name" >{{ old('p_name')}}
                            @error('p_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="p_stock">発注数量</label>
                            <input type="text" class="form-control" id="p_stock" name="p_stock" >{{ old('p_stock') }}
                            @error('p_stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="p_date">入荷予定日</label>
                            <input type="date" class="form-control" id="p_date" name="p_date" >{{old('p_date')}}
                            @error('p_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="p_order">注文者</label>
                            <input type="text" class="form-control" id="p_order" name="p_order" value="{{\Auth::user()->name}}">
                            @error('p_order')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
