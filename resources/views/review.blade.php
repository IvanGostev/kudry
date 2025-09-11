@extends('layouts.app')
@section('content')
    <section class="main-video">
        <div class="main-video__container">
            <img src="{{asset('storage/' . $review->video_preview)}}" alt="" class=""/>
            <div class="play" play="{{asset('storage/' . $review->video)}}" onclick="full_view(this);">
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
                <h3 class="main-review__name">{{$review->names}}</h3>
                <div class="img">
                    <img src="{{asset('storage/' . $review->faces)}}" alt=""/>
                </div>
            </div>
            <div class="main-review__right">
                <h5 class="main-review__title">{{$review->title_first}}</h5>
                <p class="main-review__description">{{$review->description_first}}</p>
                <div class="badge">
                    <p class="badge__company">{{$review->quote_title}}</p>
                    <h6 class="badge__title">{{$review->quote_main}}</h6>
                </div>
                <p class="main-review__description">{{$review->description_second}}</p>
            </div>
        </div>
    </section>
    <section class="review-gallery">
        <div class="review-gallery__container">
            <h4 class="review-gallery__title">Themed</h4>
            <div class="photos">
                @foreach($review->images() as $image)
                    <div class="photo">
                        <img src="{{asset('storage/' . $image->patch)}}" alt="photo"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="reels">
        <div class="reels__container">
            <div class="reels__left">
                <div class="img" style="height: 600px;">
                    <img src="{{asset('storage/' . $review->stories_preview)}}" alt=""/>
                </div>
                <div class="play" play="{{asset('storage/' . $review->stories)}}" onclick="full_view(this);">
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
            <div class="reels__right">
                <h5 class="reels__title">{{$review->title_second}}</h5>
                <p class="reels__description">{{$review->description_third}}</p>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="reviews__container">
            <h4 class="reviews__title">Reviews</h4>
            <div class="main">
                @foreach($reviews as $item)
                    <div class="review">
                        <div class="review__left">
                            <h6 class="reviews__name">{{$item->name}}</h6>
                            <p class="reviews__type">{{$item->role}}</p>
                            <div class="stars">
                                @for($i = 0; $i < $item->stars; $i++)
                                    <div class="star"><img src="{{ asset('/img/star.svg')}}" alt=""/></div>
                                @endfor()
                            </div>
                            <p class="reviews__date">{{$item->created_at->format('d M Y')}}</p>
                        </div>
                        <div class="review__right">
                            <h6 class="reviews__title">
                                {{$item->title_first}}
                            </h6>
                            <p class="reviews__description"
                               style="
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
     overflow: hidden;
     text-overflow: ellipsis;
    padding-bottom: 0;
    margin-bottom: 30px;
    letter-spacing: 0.42px;
  "
                            >{{$item->description_first}}</p>
                            <a class="reviews__link"
                               href="{{route('main.review.show', ['review' => $item->id, 'slug' => $item->slug])}}">Read
                                more</a>
                        </div>
                    </div>
                @endforeach
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
