<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルをインポート
use App\Models\Order;
use App\Models\User;
use App\Rules\Hankaku;
use Illuminate\Support\Facades\Auth;
class ItemController extends Controller

{
    // 商品一覧表示
    public function index(Request $request)
    {
        $types = [
            0 =>'',
            1 => '洗顔',
            2 => '化粧水',
            3 => '美容液',
            4 => '乳液．クリーム',
            5 => 'マスク',
        ];
        $series =[
            01=>'',
            91=>'基礎シリーズ',
            92=>'美白シリーズ',
            93=>'エイジングケアシリーズ',
        ];
        $items = Item::paginate(10); // ページネーション(10件)
        $user=$request->user();

        return view('item.index', compact('items', 'types','series','user'));
    }

    // 商品登録フォーム表示
    public function add()
    {
        return view('item.add');
    }

    // 商品を登録
    public function store(Request $request)
    {
        // 登録する情報を確認して、必要な情報が揃っているか
        // ->validate()メソッドで確認する。
        $this->validate($request, [
            'name' => 'required|max:100', // requiredは必須
            'type' => 'required|max:1',
            'series' => 'required',
            'stock' => 'required|numeric',
            'detail' => 'required|max:500',
            'manufactured_date'=>'required',
            'expiry_date'=>'required',

        ],
        [
            'name.required' => '*商品名は必須です',
            'name.max' => '*商品名は100文字以内です',
            'type.required'=>'*種別は必須です',
            'type.max' => '*種別は必須です',
            'series.required'=> '*シリーズは必須です',
            'stock.required' => '*在庫数は必須です',
            'stock.numeric' => '*在庫数は数字のみです',
            'detail.required' => '*商品詳細は必須です',
            'detail.max' => '*商品詳細は500文字以内です',
            'manufactured_date.required'=>'*製造年月日は必須です',
            'expiry_date.required'=>'*有効期限は必須です',
        ]);
        // フォームが一部空欄のまま登録を押しても、リダイレクトされて
        // 値が未入力である旨の警告メッセージが出る。

        // 新規登録に画像が含まれている場合にDBへ保存する方法


        // 新規登録するための情報をリクエストから取得
        Item::create([
            'user_id' => 1 ,//Auth::id(),
            'id' => Auth::id(),
            'name' => $request->name, 
            'type' => $request->type,
            'series' => $request->series,
            'stock' => $request->stock,
            'detail' => $request->detail,
            'manufactured_date' =>$request->manufactured_date,
            'expiry_date'=>$request->expiry_date,
   
        ]);
        

        return redirect('/item')->with('success', '商品を登録しました');
    }



    // 商品編集フォーム表示
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    // 商品を更新
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:100', // requiredは必須
            'type' => 'required|max:1',
            'series' => 'required',
            'stock' => 'required|numeric',
            'detail' => 'required|max:500',
            'manufactured_date'=>'required',
            'expiry_date'=>'required',
       
        ],
        
        [
            'name.required' => '*商品名は必須です',
            'name.max' => '*商品名は100文字以内です',
            'type.required'=>'*種別は必須です',
            'type.max' => '*種別は必須です',
            'series.required'=> '*シリーズは必須です',
            'stock.required' => '*在庫数は必須です',
            'stock.numeric' => '*在庫数は数字のみです',
            'detail.required' => '*商品詳細は必須です',
            'detail.max' => '*商品詳細は500文字以内です',
            'manufactured_date.required'=>'*製造年月日は必須です',
            'expiry_date.required'=>'*有効期限は必須です',
        ]);
    
        // 商品をデータベースで更新
        $item = Item::find($id);
        $item->name = $request->name;
        $item->type = $request->type;
        $item->series = $request->series;
        $item->stock = $request->stock;
        $item->detail = $request->detail;
        $item->manufactured_date = $request->manufactured_date;
        $item->expiry_date = $request->expiry_date;

        $item->save();
        return redirect('/item')->with('success', '商品を更新しました');
    }

    // 商品削除
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/item')->with('success', '商品を削除しました');
    }

    //商品発注

    public function order_list()
    {
        
        $orders = Order::paginate(10); // ページネーション(10件)

        return view('item.order_list', compact('orders'));
    }

    // 商品登録フォーム表示
    public function OrderAdd()
    {
        return view('item.OrderAdd');
    }

    // 商品を登録
    public function OrderStore(Request $request)
    {

        $this->validate($request, [
            'p_id'=>'required|numeric',
            'p_name' => 'required|max:100', // requiredは必須
            'p_stock' => 'required|numeric',
            'p_date'=>'required',
            'p_order'=>'required',

        ],
        [
            'p_id.required' => '*商品番号は必須です',
            'p_id.numeric' => '*商品番号は数字のみです',
            'p_name.required' => '*商品名は必須です',
            'p_name.max' => '*商品名は100文字以内です',
            'p_stock.required' => '*発注数は必須です',
            'p_stock.numeric' => '*発注数は数字のみです',
            'p_date.required'=>'*入荷予定日は必須です',
            'p_order'=>'*注文者は必須です',
        ]);
        Order::create([
            'p_id' => $request->p_id ,//Auth::id(),
            'p_order' =>Auth::id(),
            'p_name' => $request->p_name, 
            'p_stock' => $request->p_stock,
            'p_date' =>$request->p_date,
        ]);
        

        return redirect('/item/order_list')->with('success', '商品を発注しました');
    


        // 新規登録するための情報をリクエストから取得
        }



    // 商品編集フォーム表示
    public function OrderEdit($id)
    {
        $order = Order::where('p_id', '=', $id)->first();
        return view('item.OrderEdit', compact('order'));
    }

    // 商品を更新
    public function OrderUpdate(Request $request, $id)
    {
        $order = Order::where('p_id', '=', $id)->first();
        $request->validate([
            
             'p_name' => 'required|max:100', // requiredは必須
             'p_stock' => 'required|numeric',
             'p_date'=>'required',
         ],
          [
             'p_name.required' => '*商品名は必須です',
             'p_name.max' => '*商品名は100文字以内です',
             'p_stock.required' => '*発注数は必須です',
             'p_stock.numeric' => '*発注数は数字のみです',
             'p_date.required'=>'*入荷予定日は必須です',
        
         ]);
         $order->p_order=$request->p_order;
        $order->p_name = $request->p_name;
        $order->p_stock = $request->p_stock;
        $order->p_date = $request->p_date;
        $order->save();
        return redirect('/item/order_list')->with('success', '注文を更新しました');
    }

    // 商品削除
    public function OrderDestroy($id)
    {
        $order = Order::where('p_id', '=', $id)->first();
        $order->delete();

        return redirect('/item/order_list')->with('success', '注文を削除しました');
    }

   public function detail(Request $request)
   {
    $item=Item::find($request->id);
    $user=$request->user();

    return view('item.detail',compact('item','user'));
   }
 
}