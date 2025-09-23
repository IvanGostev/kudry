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
                    @method('patch')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug</label>
                            <input required type="text" value="{{$review->slug}}" name="slug" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" min="0" max="5">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Звезды от 1 до 5</label>
                            <input required type="number" value="{{$review->stars}}" name="stars" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" min="0" max="5">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Просмотры</label>
                            <input required type="number" value="{{$review->views}}" name="views" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью видео</label>
                            <input  type="file" value="{{$review->video_preview}}" name="video_preview" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Видео</label>
                            <input  type="file" value="{{$review->video}}" name="video" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Имена</label>
                            <input required type="text" value="{{$review->names}}" name="names" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Имя (кто оставил отзыв)</label>
                            <input required type="text" value="{{$review->name}}" name="name" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Роль (невеста и т.д)</label>
                            <input required type="text" value="{{$review->role}}" name="role" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотка лиц</label>
                            <input  type="file" value="{{$review->faces}}" name="faces" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Верхние название</label>
                            <input required type="text" value="{{$review->title_first}}" name="title_first" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Верхние описание первое</label>
                            <textarea required type="text"  name="description_first" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp">{{$review->description_first}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Цитата название</label>
                            <input required type="text" value="{{$review->quote_title}}" name="quote_title" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Цитата основное</label>
                            <input required type="text" value="{{$review->quote_main}}" name="quote_main" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Верхние описание второе</label>
                            <textarea required type="text" name="description_second" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp">{{$review->description_second}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Фотки</label>
                            <div class="input-images-1"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Превью для видео вертикального</label>
                            <input  type="file" value="{{$review->stories_preview}}" name="stories_preview" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Видео вертикальное</label>
                            <input  type="file" value="{{$review->stories}}" name="stories" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Нижнее название</label>
                            <input required type="text" value="{{$review->title_second}}" name="title_second" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Нижнее описание</label>
                            <textarea required type="text"  name="description_third" class="form-control" id="exampleInputEmail1"
                                      aria-describedby="emailHelp">{{$review->description_third}}</textarea>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Редактировать</button>
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

''
    </script>
@endsection
