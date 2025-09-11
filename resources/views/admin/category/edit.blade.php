@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Редактирование категории</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    @method('patch')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Название</label>
                            <input value="{{$category->title}}" type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Добавить</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>

        </div>

    </div>
@endsection
