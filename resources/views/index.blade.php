@extends('layouts.app')
@section('content')
    <section class="stories">
        <div class="stories__container">
            <video loop autoplay muted type="video/mp4" src="{{ asset('video/index.mp4')}}"></video>
        </div>
    </section>
    <section class="names">
        <div class="names__container">
            <div class="names__top">
                <div class="names__name">
                    <p class="names__left-name">
                        Sam
                    </p>
                    <p class="names__right-name">
                        & Alisa
                    </p>
                </div>
                <img class="names__avatar" src="{{asset('img/avatar.jpg')}}" style="object-fit: cover; ">
            </div>


            <p class="names__bottom-text">
                Top Wedding Videographer Spain | Europe
            </p>
            <br/>
            <p class="names__base-text">
                Inspired by the atmosphere of old Hollywood movies, we love working with light, capturing emotions and immersing ourselves in the atmosphere of the moment.
                For us, every wedding is a unique story. Elegant or romantic,
                sentimental or full of atmosphere, we strive to capture true stories full of life and feeling, creating videos that you will revisit again and again.
            </p>
            <a class="names__link" href="{{route('main.portfolio')}}">Read more about us</a>
        </div>
    </section>
    @if(count($films) > 0)
        <section class="films">
            <div class="films__container">
                <h5 class="films__title">Our films</h5>
                <div class="swiper-container filmSwiper">
                    <div class="swiper-wrapper">
                        @foreach($films as $film)
                            <div class="swiper-slide">
                                <div class="swiperFilms__video">
                                    <img src="{{asset('storage/' . $film->img)}}" alt="">
                                    <div class="stories__play play" data-fancybox="gallery"
                                         data-src="{{asset('storage/' . $film->video)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" fill="white"
                                             class="bi bi-play-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                                            <path
                                                d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h5 class="swiperFilms__title">{{$film->title}}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(count($reviews) > 0)
        <section class="reviews">
            <div class="reviews__container">
                <h4 class="reviews__title">Reviews</h4>
                <div class="swiper-container reviewSwiper">
                    <div class=" swiper-wrapper">
                        @foreach($reviews as $reviewRecommended)
                            <div class="swiper-slide review">
                                <div class="review__left">
                                    <h6 class="reviews__name">{{$reviewRecommended->names}}</h6>
                                    <p class="reviews__type">{{$reviewRecommended->geo}}</p>
                                    <div class="stars">
                                        @for($i = 0; $i < $reviewRecommended->stars; $i++)
                                            <div class="star"><img src="http://localhost:8000/img/star.svg" alt="">
                                            </div>
                                        @endfor
                                    </div>
                                    <p class="reviews__date">{{$reviewRecommended->date}}</p>
                                </div>
                                <div class="review__right">
                                    <h6 class="reviews__title" style="
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
     overflow: hidden;
     text-overflow: ellipsis;
    padding-bottom: 0;
    margin-bottom: 30px;
    letter-spacing: 0.42px;
  ">
                                        {{$reviewRecommended->vertical_title}}
                                    </h6>
                                    <p class="reviews__description" style="
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
     overflow: hidden;
     text-overflow: ellipsis;
    padding-bottom: 0;
    margin-bottom: 30px;
    letter-spacing: 0.42px;
  ">{{$reviewRecommended->vertical_description}}</p>
                                    <a class="reviews__link"
                                       href="{{route('main.review.show', ['review' => $reviewRecommended->id, 'slug' => $reviewRecommended->slug])}}">Read
                                        more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <style>
        .filmSwiper .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            gap: 10px;
        }

        .filmSwiper .swiper-slide img {
            display: block;
            width: 500px;
            object-fit: cover;
            height: 286px;
        }

    </style>
@endsection
