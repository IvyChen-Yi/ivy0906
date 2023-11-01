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
                                <a href="
                                @if ($user->role==1)
                                {{ url('item/add') }}
                                @else
                                {{url('item')}}
                                @endif
                                " 
                                class="btn btn-default">商品登録</a>
                            </div>
                            <div class="input-group-append">
                                <a href="
                                @if($user->role==1)
                                {{ url('item/OrderAdd') }}
                                @else
                                {{url('item')}}
                                @endif
                                " 
                                class="btn btn-default">商品発注</a>
                            </div>
                            
                            <div></div>
                            

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
                          
                            @foreach ($items as $index=> $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $types[$item->type] }}</td>
                                    <td>{{ $series[$item->series] }}</td>
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
                    <div class="pagination justify-content-center">
    {{ $items->links('pagination::bootstrap-4') }}
    </div>
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