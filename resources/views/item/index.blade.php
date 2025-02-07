

@extends('adminlte::page')

@section('title', '音楽一覧')

@section('content_header')
    <h1>音楽一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">音楽一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            @if(Auth::user()->role == 'admin')
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">音楽登録</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>@if(Auth::user()->role == 'admin')
                                <th></th>
                                @endif
                                <th>画像</th>
                                <th>曲名</th>
                                <th>歌手名</th>
                                <th>ジャンル</th>
                                <th>歌詞</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $value)
                                <tr data-bs-toggle="modal" data-bs-target="#{{$value->id}}modal">
                                    <td hidden>{{ $value->id }}</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td><a href="item/Edit/{{ $value->id }}">編集</a></td>
                                    @endif
                                    <td><img src="data:image/png;base64,{{$value->item_image}}" alt="" style="width:35px"></td>
                                    <td>{{$value->song_name}}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->type }}</td>
                                    <td>{{ $value->detail }}</td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="{{$value->id}}modal" tabindex="-1" aria-labelledby="{{$value->id}}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="{{$value->id}}Label">{{$value->song_name}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">                                  
                                    <div class="container-fluid">
                                        <div class="row">
                                        <div class="col-md-4" class="item_image">
                                            <img src="data:image/png;base64,{{$value->item_image}}" alt="" style="width:100px">
                                        </div>
                                        <div class="col-md-4 ms-auto">{{$value->name}}</div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3 ms-auto">[歌詞]</div>
                                        <div class="col-md-2 ms-auto"></div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 ms-auto"></div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-9">
                                            {{$value->detail}}
                                            <div class="row">
                                            <div class="col-8 col-sm-6">
                                                
                                            </div>
                                            <div class="col-4 col-sm-6">
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
