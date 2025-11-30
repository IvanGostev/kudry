@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Добавление фото</div>
                </div>
                <form action="{{route('admin.detail.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input required type="file" name="img" class="form-control">
                            <label class="input-group-text">Изображение</label>
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
