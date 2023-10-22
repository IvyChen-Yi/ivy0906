<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    public function detail(Request $request)
    {
        $item=Item::find($request->id);
        return view('item.detail',compact('item'));
    }
    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'stock'=>$request->stock,
                'series'=>$request->series,
                'manufactured_date'=>$request->manufactured,
                'expiry_date'=>$request->expiry,
                'detail' => $request->detail,
                
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

public function user(Request $request)
{
    $items = Item::all();

    return view('user.user', compact('items'));
}

    

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
        'name' => 'required|max:100', 
        'type' => 'required|max:1',
        'series' => 'required|max:1',
        'stock' => 'required|numeric',
        'detail' => 'required|max:500',
    ],
    [
        'name.required' => '*商品名は必須です',
        'name.max' => '*商品名は100文字以内です',
        'type.max' => '*種類は必須です',
        'series' => '*シリーズは必須です',
        'stock.required' => '*在庫数は必須です',
        'stock.numeric' => '*入力は数字のみです',
        'detail.required' => '*詳細は必須です',
        'detail.max' => '*詳細は500文字以内です',
        
    ]);

    // 編集時に画像が含まれている場合にDBへ保存する方法
    // if ($encoded_image) {
    //     $record = Item::find($id); // 更新対象のレコードを取得
    //     $record->img = $encoded_image; // データベースの画像列を更新
    //     $encoded_image = base64_encode($image);
    // }
    
    

    // 商品をデータベースで更新
    $item->update([
        'user_id' => 1 ,//Auth::id(),
        'ID' => Auth::id(),
        'name' => $request->name, 
        'type' => $request->type,
        'series'=>$request->series,
        'stock' => $request->stock,
        'manufactured_date'=>$request->manufactured,
        'expiry_date'=>$request->expiry,
        'detail' => $request->detail,

    ]);
   

    return redirect('/item')->with('success', '商品を更新しました');
}

// 商品削除
public function destroy($id)
{
    $item = Item::find($id);
    $item->delete();

    return redirect('/item')->with('success', '商品を削除しました');
}


public function order(Request $request)
{
    $items = Item::all();

    return view('item.order', compact('items'));

    if ($request->isMethod('post')) {
        Item::create(['p_id'=>$request->p_id,
        'p_name'=>$request->p_name,
        'p_stock'=>$request->p_stock,
        'p_date'=>$request->p_date,
        'p_order'=>$request->order,
    ]);
    return redirect('/order');

    }
}



    






}