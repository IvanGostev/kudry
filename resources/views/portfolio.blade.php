@extends('layouts.app')
@section('content')
    <section class="main-video">
        <div class="main-video__container">
            <img src="./img/stories__back.jpg" alt="" class="" />
            <div class="play">
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
    <section class="main-text">
        <div class="main-text__container">
            <div class="main-text__top">
                <div class="main-text__left">
                    <div class="main-text__avatar-and-navigate">
                        <div class="avatar">
                            <img src="./img/avatar.png" alt="" />
                        </div>
                        <p class="main-text__navigation">home / portfolio</p>
                    </div>
                    <div>
                        <h4 class="main-text__movies">Movies</h4>
                        <div class="main-text__awards">
                            <div class="main-text__award">
                                <div class="img">
                                    <img src="./img/award.svg" alt="" />
                                </div>
                                <p>Choice Awards 2022</p>
                            </div>
                            <div class="main-text__award">
                                <div class="img">
                                    <img src="./img/award.svg" alt="" />
                                </div>
                                <p>WEVA Award 2019 World</p>
                            </div>
                            <div class="main-text__award">
                                <div class="img">
                                    <img src="./img/award.svg" alt="" />
                                </div>
                                <p>Panasonic Ambassadors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-text__right">
                    <h2 class="main-text__title">
                        Paramonova Movies crafts intimate, documentary-style wedding films
                        that capture each couple's unique story
                    </h2>
                    <p class="main-text__description">
                        Victoria Paramonova, founder and film director of Paramonova
                        Movies, brings a unique artistry to wedding videography, blending
                        the sensitivity of documentary storytelling with a deeply personal
                        approach. With over a decade of experience filming weddings
                        worldwide, Victoria and her team create films that are intimate,
                        cinematic, and reflective of each couple’s unique journey. She
                        invests in the details that make each story meaningful – capturing
                        not only the couple but also the friends and family who form the
                        emotional backdrop of their day.
                    </p>
                    <div class="badge">
                        <p class="badge__company">kudryastudio Movies</p>
                        <h6 class="badge__title">
                            «Beauty of every moment with an eye for detail»
                        </h6>
                    </div>
                </div>
            </div>
            <div class="main-text__bottom">
                <p>
                    As an experienced destination videographer, Victoria often
                    collaborates with her husband, a wedding photographer, to create
                    cohesive, immersive visual stories that capture the full atmosphere
                    of each wedding location. Her films combine an aesthetic elegance
                    with stirring soundtracks, creating works that are not just
                    recordings but heartfelt, lasting mementos for couples to return to
                    through the years.
                </p>
            </div>
        </div>
    </section>
    <section class="gallery-videos">
        <div class="gallery-videos__container">
            <h4 class="gallery-videos__title">Gallery</h4>
            <div class="videos to21">
                <div class="videos__big">
                    <div class="img">
                        <img src="./img/video.png" alt="" />
                        <div class="play">
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
                <div class="videos__small">
                    <div class="row">
                        <div class="img">
                            <img src="./img/video.png" alt="" />
                            <div class="play">
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
                        <div class="img">
                            <img src="./img/video.png" alt="" />
                            <div class="play">
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
                </div>
            </div>
            <div class="videos to12">
                <div class="videos__small">
                    <div class="row">
                        <div class="img">
                            <img src="./img/video.png" alt="" />
                            <div class="play">
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
                        <div class="img">
                            <img src="./img/video.png" alt="" />
                            <div class="play">
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
                </div>
                <div class="videos__big">
                    <div class="img">
                        <img src="./img/video.png" alt="" />
                        <div class="play">
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
                Give feedback <img src="/img/message.svg" alt="" />
            </p>
        </div>
    </section>
@endsection
