@extends('admin.layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="{{asset('admin/uploader/image-uploader.min.css')}}" rel="stylesheet">
    <script src="{{ asset('admin/uploader/image-uploader.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
          integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Добавление отзыва</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.review.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Звезды от 1 до 5</label>
                            <input required type="number" name="stars" class="form-control" value="5" min="0" max="5">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Просмотры</label>
                            <input required type="number" name="views" class="form-control" value="0">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">



                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Имена</label>
                            <input required type="text" name="names" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Локация</label>
                            <input required type="text" name="geo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью видео</label>
                            <input required type="file" name="main_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Видео</label>
                            <input type="file" name="main_video" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ссылка на видео</label>
                            <input type="text" name="main_video_link" class="form-control">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью видео малое</label>
                            <input required type="file" name="small_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Видео малое</label>
                            <input type="file" name="small_video" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ссылка на видео малое</label>
                            <input type="text" name="small_video_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Заголовок для малого видео</label>
                            <input required type="text" name="small_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Описание для малого видео</label>
                            <textarea required type="text" name="small_description" class="form-control"> </textarea>
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Заголовок для блока с фотографиями</label>
                            <input required type="text" name="img_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Описание для блока с фотографиями</label>
                            <textarea required type="text" name="img_description" class="form-control"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Текст для блока с фотографиями</label>
                            <textarea required type="text" name="img_text" class="form-control"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотография первая</label>
                            <input required type="file" name="first_img" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотография вторая</label>
                            <input required type="file" name="second_img" class="form-control">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью видео вертикальное</label>
                            <input type="file" name="vertical_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Видео вертикальное</label>
                            <input type="file" name="vertical_video" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ссылка на видео вертикальное</label>
                            <input type="text" name="vertical_video_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Заголовок отзыва</label>
                            <input required type="text" name="vertical_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Описание отзыва</label>
                            <textarea required type="text" name="vertical_description" class="form-control"> </textarea>
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
