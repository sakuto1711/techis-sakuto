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
    public function Edit(request $request){
        //編集画面を渡す
        $item = item::where('id','=',$request->id)->first();
        return view('item/edit')->with([
            'items'=>$item,
        ]);
    }
    public function itemEdit(request $request){
                    // バリデーション
                    $this->validate($request, [
                        'name' => 'required|max:100',
                        'type' => 'required',
                        'detail' => 'required',
                    ],
                [
                    'name.required' => '名前は必須項目です',
                    'type.required' => '種別は必須項目です',
                    'detail.required' => '詳細説明は必須項目です',
                ]);

                //既存のレコードを所得して、編集してから保存する
                $item = item::where('id','=',$request->id)->first();
                $item->name = $request->name;
                $item->type = $request->type;
                $item->detail = $request->detail;
                $item->save();
        
                return redirect('/items');
    }
    public function itemDelete(request $request){
        //既存のレコード削除
        $item = item::where('id','=',$request->id)->first();
        $item->delete();

        return redirect('/items');
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
                'type' => 'required',
                'detail' => 'required',
            ],
        [
            'name.required' => '名前は必須項目です',
            'type.required' => '種別は必須項目です',
            'detail.required' => '詳細説明は必須項目です',
        ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

}
