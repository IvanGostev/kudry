@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Добавление информации</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.text.store')}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ключ</label>
                            <input type="text" name="key" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Текст</label>
                            <textarea type="text" name="text" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp"> </textarea>
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
