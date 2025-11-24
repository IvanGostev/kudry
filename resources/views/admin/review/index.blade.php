@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Отзывы</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr class="align-middle">
                                <td>{{$review->id}}</td>
                                <td>
                                    <p>{{$review->vertical_title}}</p>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.review.edit', $review->id)}}">Редактировать</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.review.delete', $review->id)}}" method="post">
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
            </div>
        </div>

    </div>
@endsection
