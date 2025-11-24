@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Добавление film</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.film.store')}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="file" name="img" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Изображение</label>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="video" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Видео</label>
                        </div>

                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Загрузить</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>

        </div>

    </div>
@endsection
