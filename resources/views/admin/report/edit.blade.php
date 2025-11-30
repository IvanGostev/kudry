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
            <div class="card card-dark card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Редактирование репорта</div>
                </div>
                <form class="" action="{{route('admin.report.update', $report->id)}}" enctype="multipart/form-data"
                      method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <img class="mb-2" height="200px" src="{{asset('storage/' . $report->img)}}" alt="">
                        <div class="mb-3">
                            <label class="form-label">Если хотите поменять превью, загрузите новое</label>
                            <input type="file" name="img" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Имена</label>
                            <input type="text" name="name" value="{{$report->name}}" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата</label>
                            <input type="date" name="date" value="{{$report->date}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Текст</label>
                            <textarea name="text" class="form-control">{{$report->text}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Фотки (При загрузке новых, старые удаляться)</label>
                            <div class="input-images-1"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Изменить</button>
                    </div>
                </form>
            </div>
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Видео</h3></div>
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Превью</th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr class="align-middle">
                                <td>{{$video->id}}</td>
                                <td>
                                    <img src="{{asset('storage/' . $video->img)}}" alt="" height="200">
                                </td>
                                <td>
                                    <form action="{{route('admin.report.video.delete', $video->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-dark">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="card mb-4">
                <form action="{{route('admin.report.video.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <input hidden type="text" name="report_id" value="{{$report->id}}" class=" form-control">
                        <div class="mb-3">
                            <label class="form-label">Превью</label>
                            <input required type="file" name="img" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Видео</label>
                            <input type="file" name="video" class="form-control">
                        </div>
                        <br>
                      <span>Или</span>
                        <div class="mb-3">
                            <label class="form-label">Ссылка на видео</label>
                            <input type="text" name="video_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ссылка для скачивания видео</label>
                            <input type="text" name="video_download" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Добавить</button>
                    </div>
                </form>
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
