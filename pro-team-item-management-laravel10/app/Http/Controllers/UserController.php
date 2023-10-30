<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }
  
    public function add()
    {   
        return view('user.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email'=>'required',
        'password'=>'required|min:8',
    ],
    [
        'name.required' => '*名前は必須です',
        'name.max' => '*名前は100文字以内です',
        'email' => '*メールは必須です',
        'password.required'=>'*パスワードは必須です',
        'password.min'=>'*パスワードは8英数字以上です',
    ]);

        User::create([
            'id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email, 
            'role' => $request->role,
            'password'=>'',
            

        ]);
        

        return redirect('/user')->with('success', '新規登録しました');
    


        // 新規登録するための情報をリクエストから取得
        }


    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100', // requiredは必須
            'email'=>'required',
            'password'=>'required|min:8',
            'role'=>'required|max:1',
            

        ],
        [
            'name.required'=>'*名前は必要です。',
            'name.max'=>'*名前名は100文字以内です。',
            'email.required'=>'*メールアドレスは必要です。',
            'password.required'=>'*パスワードは必要です。',
            'password.min'=>'*パスワードは8文字以上です。',
            'role.required'=>'*権限は必要です',
            'role.max'=>'*権限は必要です',


         ]);

        

        $user=User::findOrFail($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=$request->password;
        $user->role= $request->role;
        $user->save();
        return redirect('/user')->with('success', '更新しました');

    }

    public function delete(Request $request)
    {
        $user=User::find($request->id);
        
        $user->delete();
    
        return redirect('/user');
    }
}