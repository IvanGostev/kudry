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
                    <div class="card-title">Добавление поста</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.post.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью</label>
                            <input type="file" name="img" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Под категория</label>
                            <select class="form-select" id="validationCustom04" name="subcategory_id">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->category()->title . '  ' . $subcategory->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Верхние название</label>
                            <input type="text" name="top_title" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Верхние описание</label>
                            <textarea type="text" name="top_description" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотки к верхнему блоку</label>
                            <div class="input-images-1"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Нижнее название</label>
                            <input type="text" name="bottom_title" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Нижнее описание</label>
                            <textarea type="text" name="bottom_description" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотки к нижнему блоку</label>
                            <div class="input-images-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Подпись</label>
                            <input type="text" name="caption" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
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
            imagesInputName: 'photos-top'
        });


        $('.input-images-2').imageUploader({
            imagesInputName: 'photos-bottom'
        });

    </script>
@endsection
