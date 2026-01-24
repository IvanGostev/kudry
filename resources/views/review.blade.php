@extends('layouts.app')
@section('content')
    <section class="main-title">
        <div class="main-title__container">
            <h1 class="main-title__names">{{$review->names}},</h1>
            <h2 class="main-title__geo">{{$review->geo}}</h2>
        </div>
    </section>
    <section class="main-video">
        <div class="main-video__container">
            <img src="{{asset('storage/' . $review->main_video_preview)}}" alt="" class=""/>
            <div class="play" play="{{$review->main_video->link ?? asset('storage/' . $review->main_video)}}" onclick="full_view(this);">
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
    </section>
    <section class="main-review">
        <div class="main-review__container">
            <div class="main-review__left">
                <div class="img">
                    <img src="{{asset('storage/' . $review->small_video_preview)}}" alt=""/>
                    <div class="play" play="{{$review->small_video_link ?? asset('storage/' . $review->small_video)}}" onclick="full_view(this);">
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
            <div class="main-review__right">
                <h5 class="main-review__title">{{$review->small_title}}</h5>
                <p class="main-review__description">{{$review->small_description}}</p>
            </div>
        </div>
    </section>
    <section class="main-review second">
        <div class="main-review__container" style="justify-content: space-between">

            <div class="main-review__right">
                <div class="badge">
                    <p class="badge__company">{{$review->img_title}}</p>
                    <h6 class="badge__title">{{$review->img_description}}</h6>
                </div>
                <p class="main-review__description">{{$review->img_text}}</p>
            </div>
            <div class="main-review__left review_new-images" style="display: flex; flex-direction: column; gap: 10px">
                <div class="img" style="aspect-ratio: 16 / 9; object-fit: cover;">
                    <img src="{{asset('storage/' . $review->first_img)}}" alt=""/>
                </div>
                <div class="img" style="aspect-ratio: 16 / 9; object-fit: cover;" >
                    <img src="{{asset('storage/' . $review->second_img)}}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="reels">
        <div class="reels__container"
             @if (!($review->vertical_video_preview and $review->vertical_video)) style="grid-template-columns: 1fr!important;" @endif>
            @if ($review->vertical_video_preview and $review->vertical_video)
                <div class="reels__left">
                    <div class="img" style="height: 600px;">
                        <img src="{{asset('storage/' . $review->vertical_video_preview)}}" alt=""/>
                    </div>
                    <div class="play" play="{{$review->vertical_video_link ?? asset('storage/' . $review->vertical_video)}}" onclick="full_view(this);">
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
            @endif
            <div class="reels__right"
                 @if (!($review->vertical_video_preview and $review->vertical_video)) style="margin: 0 auto;" @endif>
                <h5 class="reels__title" style="text-align: center; font-weight: bold">Testimonials</h5>
                <p class="reels__description"
                   style="color: black; padding-bottom: 20px; text-align: center; font-weight: bold">{{$review->names}}</p>
                <div class="badge">
                    <p class="badge__company">{{$review->vertical_title}}</p>
                    <h6 class="badge__title">{{$review->vertical_description}}</h6>
                </div>
            </div>
        </div>
    </section>
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
                                    <div class="star"><img src="http://localhost:8000/img/star.svg" alt=""></div>
                                    @endfor
                                </div>
                                <p class="reviews__date">{{$reviewRecommended->date}}</p>
                            </div>
                            <div class="review__right">
                                <h6 class="reviews__title">
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
                                <a class="reviews__link" href="{{route('main.review.show', ['review' => $reviewRecommended->id, 'slug' => $reviewRecommended->slug])}}">Read
                                    more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
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
