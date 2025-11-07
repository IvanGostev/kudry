@extends('layouts.app')
@section('content')
    <section class="guide">
        <div class="guide__container">
            <div class="guide__left">
                <h6 class="guide__category">Guide</h6>
                <h3 class="guide__title">WEDDING GUIDE: 2026 edition</h3>
                <p class="guide__description">
                    Introducing THE WED 2025 Wedding Guide — your exclusive insider’s
                    pass to the latest wedding trends, innovations, and forward-thinking
                    ideas reshaping the scene. Always one step ahead, THE WED keeps a
                    constant pulse on what’s new and next in the wedding world. Whether
                    you're a modern couple daring to redefine tradition or a creative
                    professional in search of bold, new inspiration, this guide is your
                    ultimate go-to resource for 2025 weddings.
                </p>
                <a href="" class="guide__btn">Buy the guide</a>
            </div>
            <div class="guide__right">
                <div class="guide__img">
                    <img src="{{asset('img/guide__img-top.png')}}" alt="" class="guide__img-top"/>
                    <img
                        src="{{asset('img/guide__img-top.png')}}"
                        alt=""
                        class="guide__img-bottom"
                    />
                </div>
            </div>
        </div>
    </section>
    @for($i = 0; $i < count($packages); $i++)
        <section class="guide-block">
            <div class="guide-block__container {{$i % 2 != 0 ? 'reverse' : '' }}">
                <div class="guide-block__left">
                    <h6 class="guide-block__title">{{$packages[$i]['title']}}</h6>
                    <p class="guide-block__description">{{$packages[$i]['description']}}</p>
                </div>
                <div class="guide-block__right">
                    <div class="img">
                        <img src="{{asset($packages[$i]['img'])}}" alt=""/>
                    </div>
                </div>
            </div>
        </section>
    @endfor
    <section class="sale">
        <div class="sale__container">
            <div class="sale__line first">
                <img src="{{ asset('/img/line-1.png')}}" alt=""/>
            </div>
            <div class="sale__line second">
                <img src="{{ asset('/img/line-2.png')}}" alt=""/>
            </div>
            <div class="sale__line third">
                <img src="{{ asset('/img/line-3.png')}}" alt=""/>
            </div>
            <div class="sale__explanation first">
                <p>Your personal moodboard for an elegant 2025 wedding.</p>
            </div>
            <div class="sale__explanation second">
                <p>
                    Your personal moodboard for an elegant 2025 wedding.
                </p>
            </div>
            <div class="sale__explanation third">
                <p>A curated guide for brides who see wedding as art.</p>
            </div>
            <div class="sale__phone">
                <div class="main">
                    <div class="sale__blur">
                        <h6 class="sale__version">2025 Edition</h6>
                        <p class="sale__info">
                            The ultimate resource for wedding insights in 2025
                        </p>
                    </div>
                </div>
            </div>
            <div class="sale__bottom">
                <h5 class="sale__title">FREE $</h5>
                <a href="" class="sale__link">Download the guide</a>
                <p class="sale__description">Explore 5 Chapters of 150+ Ideas</p>
            </div>
        </div>
    </section>
    <section class="feedback-top">
        <div class="feedback-top__container">
            <h3 class="feedback-top__title">Did you like my video?</h3>
            <p class="feedback-top__description">Tell us about your experience</p>
            <p class="feedback-top__text">
                Give feedback <img src="{{asset('/img/message.svg')}}" alt=""/>
            </p>
        </div>
    </section>
@endsection
