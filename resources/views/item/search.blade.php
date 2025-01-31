@extends('adminlte::page')

@section('title', '音楽検索')

@section('content_header')
    <h1>音楽検索</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">音楽検索</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
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
    <div class="container-fluid py-3">
        <div class="row gx-3 gy-3">
            <aside class="col-12 col-md-3 col-lg-2">
                <form action="/search" method="get">
                    <h3 class="mb-3">カテゴリー</h3>
                    <div class="mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="フリーワードで検索" style="font-size:1rem;">
                    </div>
                    <div class="form-check mb-2 d-flex align-items-center">
                        <input name="types[]" class="form-check-input" type="checkbox" value="邦楽" id="japan-musicCheck">
                        <label class="form-check-label" for="japan-musicCheck">邦楽</label>
                    </div>
                    <div class="form-check mb-2 d-flex align-items-center">
                        <input name="types[]" class="form-check-input" type="checkbox" value="洋楽" id="Western-musicCheck">
                        <label class="form-check-label" for="Western-musicCheck">洋楽</label>
                    </div>
                    <div class="form-check mb-2 d-flex align-items-center">
                        <input name="types[]" class="form-check-input" type="checkbox" value="HipHop" id="HipHopCheck">
                        <label class="form-check-label" for="HipHopCheck">HipHop</label>
                    </div>
                    <div class="form-check mb-2 d-flex align-items-center">
                        <input name="types[]" class="form-check-input" type="checkbox" value="J-pop" id="J-popCheck">
                        <label class="form-check-label" for="J-popCheck">J-pop</label>
                    </div>
                    <button class="btn btn-success w-100 mt-3" style="font-size:1rem;">検索</button>
                </form>
            </aside>
            <section class="col-12 col-md-9 col-lg-10">
                <div class="row equipment-list g-3">
                    <!-- 動的に表示されます -->
                </div>
            </section>
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