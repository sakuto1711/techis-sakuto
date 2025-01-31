<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller


{
    /**ユーザーリスト表示 */
    public function list()
    {
        $users = User::all();
        return view('user.list', [
            'users' => $users,
        ]);
    }
    public function edit($id)//
    {
        $user = user::find($id);
        return view('user/edit',[
            'user' => $user,
        ]);
    }



    /**ユーザー情報更新　*/
    public function useredit(Request $request, $id)
    {
        /**バリデートする */
        $validateData = $request->validate([
            'name' => 'required|string|max:100',           
            'email' => 'required|email|max:255',
            'like_name' => 'nullable|string|max:100',
            'like_type' => 'nullable|string|max:100',
        ],[
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスメールアドレスを入力してください。',
            'like_name.max' => '好きな歌手は100文字以下で入力してください。',
            'like_type.max' => '好きなジャンルは100文字以下で入力してください。',
        ]);

        $user = User::findOrFail($id);

        /**更新処理 */
        $user->name =$validateData['name'];
        $user->email = $validateData['email'];
        $user->like_name =$validateData['like_name'];
        $user->like_type =$validateData['like_type'];
        $user->save();

        return redirect("/user/list");
    }

    /**ユーザー情報の削除 */
    public function userdelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        return redirect("/user/list");
    }

}