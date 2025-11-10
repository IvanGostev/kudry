@extends('layouts.app')
@section('content')
    <section class="stories">
        <div class="stories__container">
            <div class="stories__play play" data-fancybox="gallery" data-src="./video/demo.mp4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="78"
                    height="78"
                    fill="white"
                    class="bi bi-play-circle"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                    />
                    <path
                        d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"
                    />
                </svg>
            </div>
            <div class="stories__text">
                HONEST STORIES <br/>
                ABOUT LOVE
            </div>
        </div>
    </section>
    <section class="names">
        <div class="names__container">
            <p class="names__top-text">You guessed right, we are</p>
            <p class="names__main-text">
                Sam <br/>
                & <br/>
                alisa
            </p>
            <p class="names__bottom-text">
                Top Wedding Videographer Spain | Europe
            </p>
            <br/>
            <p class="names__base-text">
                Cinematic wedding films created with emotion, light, and sound. Based
                in Spain and working across Europe — from coastal elopements to
                timeless celebrations in historic cities. We focus on authentic
                moments, natural movement, and storytelling that feels honest and
                atmospheric.
            </p>
            <a class="names__link" href="{{route('main.portfolio')}}">Read more about us</a>
        </div>
    </section>
    <section class="films">
        <div class="films__container">
            <h5 class="films__title">Our films</h5>
            <div class="films__box">
                @foreach($films as $film);
                <div class="films__item">
                    <div class="films__img">
                        <img src="{{asset($film->img)}}" alt=""/>
                    </div>
                    <div class="films__text">{{$film->title}}</div>
                </div>
                @endforeach
            </div>
            <a href="{{route('main.blog')}}" class="films__link"> WATCH THE PROJECT </a>
        </div>
    </section>
    <section class="slides">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($slides as $slide)
                <div class="swiper-slide">
                    <div class="slide-content">
                        <p class="slider__text">{{$slide->info}}</p>
                        <h2 class="slider__title">
                            {{$slide->title}}
                        </h2>
                        <a class="slider__link" href="{{$slide->url}}" style="color: black">Watch their film</a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="instagram">
        <h5 class="instagram__title">Check us on instagram</h5>
        <div class="swiper-container instSwiper" style="width: 100%; overflow: hidden">
            <div class="swiper-wrapper">
                @foreach($insts as $inst)
                    <div class="swiper-slide">
                        <a href="{{$inst->url}}"><img src="{{asset($inst->img)}}" alt=""/></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
