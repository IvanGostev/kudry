@extends('layouts.app')
@section('content')
    <section class="main-text">
        <div class="main-text__container">
            <div class="main-text__top">
                <div class="main-text__left">
                    <div class="main-text__avatar-and-navigate">
                        <div data-fancybox="gallery" data-src="./img/avatar.png" class="avatar">
                            <img src="{{ asset('img/avatar.png')}}" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="main-text__right">
                    <h2 class="main-text__title">
                        Paramonova Movies crafts intimate, documentary-style wedding films
                        that capture each couple's unique story
                    </h2>
                    <p class="main-text__description">
                        Sam & Alisa Kudrya create intimate, cinematic wedding films that capture the true emotions and atmosphere of each celebration.
                        Working together as a single creative team, Sam and Alisa film weddings across Spain and throughout Europe, blending candid moments with a refined editorial vision. Their approach is built on honest observation and deep respect for each couple’s personal story. They pay attention to the small details and subtle moments that often go unnoticed  yet these are the elements that make each wedding story genuine and deeply moving. </p>
                    <div class="badge">
{{--                        <p class="badge__company">kudryastudio Movies</p>--}}
                        <h6 class="badge__title" style="padding-top: 50px;">
                            «We often hear: “It feels like I lived that day all over again!” — and every time, that is exactly our goal: to bring you back to those moments.»
                        </h6>
                    </div>
                </div>
            </div>
            <div class="main-text__bottom">
                <p>
                    As experienced destination wedding videographers, they work side by side, crafting visual stories where movement, emotion, and the atmosphere of the day naturally come together. Their portfolio is not just a collection of wedding videos, but a series of thoughtful, soulful films filled with aesthetics, intimacy, and a touch of humor.
                    Each project becomes a living, emotional film that couples return to again and again to relive their day exactly as it felt.
                </p>
            </div>
        </div>
    </section>
    <section class="gallery-videos">
        <div class="gallery-videos__container">
            <h4 class="gallery-videos__title">Gallery</h4>
            <div class="videos">
                @foreach($works as $work)
                    <div class="videos__big">
                        <div class="img">
                            <img src="{{asset($work->img)}}" alt=""/>
                            <div class="play" data-fancybox="gallery" data-src="{{$work->link ?? asset('storage/' . $work->video)}}">
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{--    <section class="reviews">--}}
    {{--        <div class="reviews__container">--}}
    {{--            <h4 class="reviews__title">Reviews</h4>--}}
    {{--            <div class="main">--}}
    {{--                @foreach($reviews as $item)--}}
    {{--                    <div class="review">--}}
    {{--                        <div class="review__left">--}}
    {{--                            <h6 class="reviews__name">{{$item->name}}</h6>--}}
    {{--                            <p class="reviews__type">{{$item->role}}</p>--}}
    {{--                            <div class="stars">--}}
    {{--                                @for($i = 0; $i < $item->stars; $i++)--}}
    {{--                                    <div class="star"><img src="{{ asset('/img/star.svg')}}" alt=""/></div>--}}
    {{--                                @endfor()--}}
    {{--                            </div>--}}
    {{--                            <p class="reviews__date">{{$item->created_at->format('d M Y')}}</p>--}}
    {{--                        </div>--}}
    {{--                        <div class="review__right">--}}
    {{--                            <h6 class="reviews__title">--}}
    {{--                                {{$item->title_first}}--}}
    {{--                            </h6>--}}
    {{--                            <p class="reviews__description"--}}
    {{--                               style="--}}
    {{--    display: -webkit-box;--}}
    {{--    -webkit-line-clamp: 4;--}}
    {{--    -webkit-box-orient: vertical;--}}
    {{--     overflow: hidden;--}}
    {{--     text-overflow: ellipsis;--}}
    {{--    padding-bottom: 0;--}}
    {{--    margin-bottom: 30px;--}}
    {{--    letter-spacing: 0.42px;--}}
    {{--  "--}}
    {{--                            >{{$item->description_first}}</p>--}}
    {{--                            <a class="reviews__link"--}}
    {{--                               href="{{route('main.review.show', ['review' => $item->id, 'slug' => $item->slug])}}">Read--}}
    {{--                                more</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
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
