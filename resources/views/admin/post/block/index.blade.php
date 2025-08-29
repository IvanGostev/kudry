@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Блоки к посту <a href="{{route('admin.post.block.index', $post->id)}}">#{{$post->id}}</a></h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-dark w-100" href="{{route('admin.post.block.create', $post->id)}}">Добавить блок</a>
                    <br> <br>
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                            <tr class="align-middle">
                                <td>{{$block->id}}</td>
                                <td>
                                    <p>{{$block->title}}</p>
                                </td>
                                <td>
                                    <form action="{{route('admin.post.block.delete', $block->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-dark">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer clearfix">--}}
{{--                    <ul class="pagination pagination-sm m-0 float-end">--}}
{{--                        <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>

    </div>
@endsection
