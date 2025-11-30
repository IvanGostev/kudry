@extends('layouts.app')
@section('content')
    <section class="report-main">
        <div class="report-main__container">
            <div class="report__image">
                <img data-fancybox="gallery" data-src="{{asset("storage/" . $report->img)}}" src="{{asset("storage/" . $report->img)}}" alt="">
                <div class="report-main__text">
                    <p class="report-main__name">{{$report->name}}</p>
                    <p class="report-main__date">{{$report->date}}</p>
                </div>
            </div>
            <div class="report__images">
                @foreach($report->images() as $image)
                    <img data-fancybox="gallery"  data-src="{{asset('storage/' . $image->img)}}" src="{{asset('storage/' . $image->img)}}" alt="">
                @endforeach()
            </div>
        </div>
    </section>
    <section class="report-text">
        <div class="report-text__container">
            <p class="report-text__main">
                {!! $report->text !!}
            </p>
        </div>
    </section>
    @foreach($report->videos() as $video)
    <section class="report-video">
        <div class="report-video__container">
            <a  data-fancybox data-src="{{$video->video_link ?? asset("storage/" . $video->video)}}" class="report-video__top">Watch the film</a>
            <div data-fancybox="gallery" data-src="{{$video->video_link ?? asset("storage/" . $video->video)}}" class="report-video__main">
                <img src="{{asset("storage/" . $video->img)}}" alt="">
                <div class="report-video__play play">
                    <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" fill="white"
                         class="bi bi-play-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                        <path
                            d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"></path>
                    </svg>
                </div>
            </div>
            <a href="{{$video->video_download ?? asset("storage/" . $video->video)}}" class="report-video__bottom">Download the film</a>
        </div>
    </section>
    @endforeach

    <section class="feedback-top">
        <div class="feedback-top__container">
            <h3 class="feedback-top__title">Did you like my video?</h3>
            <p class="feedback-top__description">Tell us about your experience</p>
            <p class="feedback-top__text">
                Give feedback <img src="/img/message.svg" alt=""/>
            </p>
        </div>
    </section>
@endsection
