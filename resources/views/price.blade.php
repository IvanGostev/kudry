@extends('layouts.app')
@section('content')
    {{--    <object style="margin-top: 100px" data="{{asset('files/price.pdf#toolbar=0')}}"  width="100%" height="4200px">--}}
    {{--    </object>--}}
    <div class="price-content" style="; width: 100%;">
        @foreach($details as $detail)
            <div style="padding-bottom: 40px;">
                <img style="width: 100%; height: 100%;" src="{{$detail->img}}" alt="">
            </div>
        @endforeach
    </div>
    <style>
        .price-content {
            padding: 100px 40px 0 40px
        }
        @media(max-width: 420px) {
            .price-content {
                padding: 60px 10px 0 10px
            }
        }
    </style>
@endsection
