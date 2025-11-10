@extends('admin.layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="{{asset('admin/uploader/image-uploader.min.css')}}" rel="stylesheet">
    <script src="{{ asset('admin/uploader/image-uploader.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Добавление репорта</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.report.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Превью</label>
                            <input type="file" name="img" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Имена</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Текст</label>
                            <textarea name="text" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Фотки</label>
                            <div class="input-images-1"></div>
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
    <script>
        $('.input-images-1').imageUploader({
            imagesInputName: 'photos'
        });
    </script>
@endsection
