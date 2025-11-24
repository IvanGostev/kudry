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
                    <div class="card-title">Редактирование отзыва</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.review.update', $review->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Звезды от 1 до 5</label>
                            <input required type="number" name="stars" class="form-control" value="{{$review->stars}}" min="0" max="5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Просмотры</label>
                            <input required type="number" name="views" class="form-control" value="{{$review->views}}">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">



                        <div class="mb-3">
                            <label class="form-label">Имена</label>
                            <input required type="text" name="names" value="{{$review->names}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Локация</label>
                            <input required type="text" name="geo" value="{{$review->geo}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Превью видео (если не заполнять, останется старое)</label>
                            <input  type="file" name="main_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Видео (если не заполнять, останется старое)</label>
                            <input  type="file" name="main_video" class="form-control">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">


                        <div class="mb-3">
                            <label class="form-label">Превью видео малое (если не заполнять, останется старое)</label>
                            <input type="file" name="small_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Видео малое (если не заполнять, останется старое)</label>
                            <input type="file" name="small_video" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Заголовок для малого видео</label>
                            <input required type="text" value="{{$review->small_title}}" name="small_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание для малого видео</label>
                            <textarea required type="text" name="small_description" class="form-control">{{$review->small_description}}</textarea>
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">

                        <div class="mb-3">
                            <label class="form-label">Заголовок для блока с фотографиями</label>
                            <input required type="text" value="{{$review->img_title}}" name="img_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание для блока с фотографиями</label>
                            <textarea required type="text" name="img_description" class="form-control">{{$review->img_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Текст для блока с фотографиями</label>
                            <textarea required type="text" name="img_text" class="form-control">{{$review->img_text}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Фотография первая</label>
                            <input type="file" name="first_img" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Фотография вторая</label>
                            <input type="file" name="second_img" class="form-control">
                        </div>
                        <br>
                        <hr style="opacity: 1;border-width: 2px;">

                        <div class="mb-3">
                            <label class="form-label">Превью видео вертикальное</label>
                            <input type="file" name="vertical_video_preview" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Видео вертикальное</label>
                            <input type="file" name="vertical_video" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Заголовок отзыва</label>
                            <input value="{{$review->vertical_title}}" required type="text" name="vertical_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание отзыва</label>
                            <textarea required type="text" name="vertical_description" class="form-control">{{$review->vertical_description}}</textarea>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Изменить</button>
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
