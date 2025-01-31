@extends('adminlte::page')

@section('title', 'ユーザー情報編集')

@section('content_header')
    <h1>ユーザー情報編集</h1>
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
                <form action="/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <input type="text" name="id" value="{{$user->id}}" hidden>
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="変更後の名前">
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="変更後のメールアドレス">
                        </div>

                        <div class="form-group">
                            <label for="like_name">好きな歌手</label>
                            <input type="text" class="form-control" id="like_name" name="like_name" value="{{$user->like_name}}" placeholder="変更後の好きな歌手">
                        </div>

                        <div class="form-group">
                            <label for="like_type">好きなジャンル</label>
                            <input type="text" class="form-control" id="like_type" name="like_type" value="{{$user->like_type}}" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
                <form action="/userdelete/{{$user->id}}" method="post">
                    @csrf
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('削除してよろしいですか？')">削除</button> 
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
@stop