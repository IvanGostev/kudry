@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Добавление работы</div>
                </div>
                <form action="{{route('admin.work.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input required type="file" name="img" class="form-control">
                            <label class="input-group-text">Изображение</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="video" class="form-control">
                            <label class="input-group-text">Видео</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="link" class="form-control">
                            <label class="input-group-text">Ссылка на Видео</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Загрузить</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
