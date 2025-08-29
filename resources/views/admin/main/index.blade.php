@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Основная информация</h3> <br>
                <p class="card-text" style="color: blue">Privacy Policy = privacy-policy <br>
                    Terms of Use = terms-of-use
                </p></div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col" style="width: 150px">Ключ</th>
                            <th scope="col">Информация</th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($texts as $text)
                            <tr class="align-middle">
                                <td>{{$text->id}}</td>
                                <td>
                                    <p>{{$text->key}}</p>
                                </td>
                                <td>
                                    <p>{{$text->text}}</p>
                                </td>
                                <td>
                                    <form action="{{route('admin.text.delete', $text->id)}}" method="post">
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
