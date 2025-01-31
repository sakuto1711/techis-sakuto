<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>User list</title>
</head>
<body>
@extends('adminlte::page')

@section('title', 'ユーザー情報一覧')

@section('content_header')
    <h1>ユーザー情報一覧</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <!--ユーザー一覧-->
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-1"></td>
                                <td>ID</td>
                                <td>名前</td>
                                <td>メールアドレス</td>
                                <td >好きな歌手</td>
                                <td>好きなジャンル</td>
                                <td>更新日時</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="col-1"></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->like_name }}</td>
                                <td>{{ $user->like_type }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="/user/edit/{{ $user->id }}" class="btn btn-success" >編集</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <!-- Bootstrap JS -->
        </div>
    </div>
    @stop

@section('css')
    <link rel="stylesheet" href="app.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
@stop
</body>
</html>