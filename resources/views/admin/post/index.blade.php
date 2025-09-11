@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Посты</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="align-middle">
                                <td>{{$post->id}}</td>
                                <td>
                                    <p>{{$post->top_title}}</p>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.post.block.index', $post->id)}}">Блоки</a>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.post.edit', $post->id)}}">Редактировать</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.post.delete', $post->id)}}" method="post">
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
