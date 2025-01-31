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
     * 音楽一覧
     */
    public function index()
    {
        // 音楽一覧取得
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
        $request->validate(
            [
                'song_name' => 'required',
                'name' => 'required',
                'type' => 'required',
                'detail' => 'required',
                'item_image' => 'required',
            ],
            [
                'song_name.required' => '曲名を入力してください',
                'name.required' => '歌手名を入力してください',
                'type.required' => 'ジャンルを選択してください',
                'detail.required' => '歌詞を入力してください',
                'item_image.required' => '画像を選択してください',
            ]
            );
                $item_image = null; //nullが許容されるファイル
                if ($request->hasFile('item_image')){ // もし送信データに'item_img'があったら
                    $item_image = base64_encode(file_get_contents($request->file('item_image')));         
                }

                //既存のレコードを所得して、編集してから保存する
                $item = item::where('id','=',$request->id)->first();
                $item->song_name = $request->song_name;
                $item->name = $request->name;
                $item->type = $request->type;
                $item->detail = $request->detail;
                $item->item_image = $item_image;
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
     * 音楽登録
     */
    public function itemAdd(request $request){
        $request->validate(
            [
                'song_name' => 'required',
                'name' => 'required',
                'type' => 'required',
                'detail' => 'required',
                'item_image' => 'required',
            ],
            [
                'song_name.required' => '曲名を入力してください',
                'name.required' => '歌手名を入力してください',
                'type.required' => 'ジャンルを選択してください',
                'detail.required' => '歌詞を入力してください',
                'item_image.required' => '画像を選択してください',
            ]
            );

            $item_image = null; //nullが許容されるファイル
            if ($request->hasFile('item_image')){ // もし送信データに'item_img'があったら
                $item_image = base64_encode(file_get_contents($request->file('item_image')));         
            }

            $item = new item();
            $item->song_name = $request->song_name;
            $item->name = $request->name;
            $item->type = $request->type;
            $item->detail = $request->detail;
            $item->item_image = $item_image;
            $item->save();

            return redirect('/items');
    }
    public function add(){
        return view('item/add');
    }
    public function search(Request $request)
    {
        // 音楽一覧取得
   /* テーブルから全てのレコードを取得する */
    $items = Item::query();


    /* キーワードから検索処理 */
    $keyword = $request->input('keyword');
    if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
        $items->where('song_name', 'LIKE', "%{$keyword}%")
        ->orwhere('name', 'LIKE', "%{$keyword}%")
        ->orwhere('detail', 'LIKE', "%{$keyword}%")
        ->get();
    }
    if(is_array($request->input('types'))){

        $items->where(function($q) use($request){
            foreach($request->input('types') as $type){
                $q->orWhere('type',$type);
            }
        });
    
    }
    /* ページネーション */
    $items = $items->paginate(100);

        return view('item.search', compact('items'));
    }

}
