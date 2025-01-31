@extends('adminlte::page')

@section('title', '音楽編集')

@section('content_header')
    <h1>音楽編集</h1>
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
                <form action="/itemEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <input type="text" name="id" value="{{$items->id}}" hidden>
                            <label for="name">曲名</label>
                            <input type="text" class="form-control" id="song_name" name="song_name" value="{{$items->song_name}}" placeholder="曲名">
                        </div>
                        <div class="form-group">
                            <label for="name">歌手名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$items->name}}" placeholder="歌手名">
                        </div>

                        <div class="form-group">
                            <label for="type">ジャンル</label>
                            <select name="type" class="form-control">
                                <option value="{{$items->type}}">{{$items->type}}</option>
                                <option value="邦楽">邦楽</option>
                                <option value="洋楽">洋楽</option>
                                <option value="HipHop">HipHop</option>
                                <option value="J-pop">J-pop</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">歌詞</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{$items->detail}}" placeholder="詳細説明">
                        </div>
                    </div>
                    <div class="item_image">
        <label for="item_image"></label>
        <input class="base64_image" type="file" name="item_image" id="item_image" accept="image/*">
            <figure id="image">
            <img class="image" src="data:image/png;base64,{{$items->item_image}}" alt="" id="itemImage" style="max-width: 100%">
        </figure>
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                    <div class="card-footer">
                        <a href="/itemDelete/{{$items->id}}"><button type="button" class="btn btn-primary">削除</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/item.css') }}">
@stop

@section('js')
<script>

function main () {
    const item_image = document.querySelector('#item_image')
    const image = document.querySelector('#image')
    const itemImage = document.querySelector('#itemImage')

  item_image.addEventListener('change', (event) => { // <1>
    const [file] = event.target.files

    if (file) {
        itemImage.setAttribute('src', URL.createObjectURL(file))
        image.style.display = 'block'
    } else {
        image.style.display = 'none'
    }

    })
}

main()



    </script>
@stop