@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>このサイトの説明</h1>
@stop

@section('content')
    <p>画面は左のサイドバーから色々な画面に遷移できます。可能なことは音楽を一覧すること、音楽を検索することです。</p>
    <p>音楽一覧では音楽の曲名、歌手名、ジャンル、画像、歌詞を閲覧できます。</p>
    <p>音楽検索では、ジャンルで検索できたり、フリーワードで検索することが可能です。</p>
    <p>好きな音楽を見つけて楽しんでください。</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
