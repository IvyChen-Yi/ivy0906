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
        'name' => 'required|max:100',
        'email'=>'required',
        'password'=>'required|min:8',
        'role'=>'required',
    ],
    [
        'name.required' => '*名前は必須です',
        'name.max' => '*名前は100文字以内です',
        'email' => '*メールは必須です',
        'password.required'=>'*パスワードは必須です',
        'password.min'=>'*パスワードは8英数字以上です',
        'role'=>'*権限は必須です',

    ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'role' => $request->role,
            'password'=>$request->password,
            

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
            'name' => 'required',
            'email'=>'required',
            'role'=>'required',
        ],
        [
            'name.required' => '*名前は必須です',
            'email' => '*メールは必須です',
            'role'=>'*権限は必須です',

            
        ]);
    

        

        $user=User::findOrFail($id);
        $user->name= $request->name;
        $user->email= $request->email;
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