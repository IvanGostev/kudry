@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Репорты</h3></div>
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Дата</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr class="align-middle">
                                <td>{{$report->id}}</td>
                                <td>{{$report->name}}</td>
                                <td>{{$report->date}}</td>
                                <td>
                                    <a type="submit" class="btn btn-dark"
                                       onclick="copyURI(event)" href="{{route('report.show', ['report' => $report->id, 'slug' => slug($report->name)])}}">Скопировать
                                        ссылку</a>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark"
                                       href="{{route('admin.report.edit', $report->id)}}">Редактировать</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.report.delete', $report->id)}}" method="post">
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
        </div>
    </div>
    <script>
        function copyURI(evt) {
            evt.preventDefault();
            navigator.clipboard.writeText(evt.target.getAttribute('href')).then(() => {
                /* clipboard successfully set */
            }, () => {
                /* clipboard write failed */
            });
        }</script>
@endsection
