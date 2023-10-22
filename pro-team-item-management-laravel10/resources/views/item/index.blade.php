@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools d-flex ">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                            <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#SearchModal" data-bs-whatever="@mdo">商品検索</button>
                            </div>
                            <!--Modal-->

<div class="modal fade" id="SearchModal" tabindex="-1" aria-labelledby="SearchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SearchModal">商品検索</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="type" class="col-form-label">種別</label>
            <br>
            <select id="type" class="form-control">
                <option value="">種別を選択ください</option>
                <option value="">洗顔</option>
                <option value="">化粧水</option>
                <option value="">美容液</option>
                <option value="">乳液・クリーム</option>
                <option value="">マスク</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="series" class="col-form-label">シリーズ</label>
            <br>
            <select id="series" class="form-control">
                <option value="">種別を選択ください</option>
                <option value="">基礎シリーズ</option>
                <option value="">美白シリーズ</option>
                <option value="">エイジングケアシリーズ</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">有効期限</label>
            <br>
            <input type="radio" id="3mon" name="s-date" value="3mon" checked>
            <label for="3mon">三ヶ月以内</label>
            <input type="radio" id="2mon" name="s-date" value="2mon" checked>
            <label for="2mon">二ヶ月以内</label>
            <input type="radio" id="1mon" name="s-date" value="1mon" checked>
            <label for="1mon">一ヶ月以内</label>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">一覧に戻る</button>
        <button type="button" class="btn btn-primary">検索</button>
      </div>
    </div>
  </div>
</div>
                            <!--Modal end-->
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                   
                        
                    </div>
                    
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>商品番号</th>
                                <th>商品名</th>
                                <th>種別</th>
                                <th>シリーズ</th>
                                <th>在庫数</th>
                                <th>製造年月日</th>
                                <th>有効期限</th>
                                <th>商品詳細</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @switch($item->type)
                                        @case(1)
                                        洗顔
                                        @break
                                        @case(2)
                                        化粧水
                                        @break
                                        @case(3)
                                        美容液
                                        @break
                                        @case(4)
                                        乳液．クリーム
                                        @break
                                        @case(5)
                                        マスク
                                        @break
                                    @endswitch
                                    </td>
                                    <td>@switch($item->series)
                                        @case(91)
                                        基礎シリーズ
                                        @break
                                        @case(92)
                                        美白シリーズ
                                        @break
                                        @case(93)
                                        エイジングケアシリーズ
                                        @break
                                        @endswitch
                                        </td>
                                    <td>{{number_format($item->stock) }}</td>
                                    <td>{{ $item->manufactured_date }}</td>
                                    <td>{{ $item->expiry_date }}</td>
                                    <td>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-append">
                                                  <a href="/item/detail/{{$item->id}}" class="btn btn-default">商品詳細</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!--Search Modal-->


<!--Search Modal end-->
@stop
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@section('css')
@stop

@section('js')
@stop
