<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @if(seo(request()->path()))
        <title>{{seo(request()->path())->title}}</title>
        <meta name="description" content="{{seo(request()->path())->description}}"/>
        <meta name="keywords" content="{{seo(request()->path())->keywords}}"/>
    @else
        <title>Kydrostudio</title>
    @endif
    <meta name="p:domain_verify" content="c457e056c1b1d808e0a52b5f7862cf05"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/swiper.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/reset.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/main.css')}}"/>
</head>
<body>
<header class="header">
    <div class="header__container">
        <nav class="nav">
            <div class="nav__left">

                <ul class="nav__ul">
                    <li class="nav__li"><a href="{{route('main.index')}}">HOME</a></li>
                    <li class="nav__li"><a href="{{route('main.portfolio')}}">PORTFOLIO</a></li>
                    <li class="nav__li"><a href="{{route('main.packages')}}">PACKAGES</a></li>
                </ul>
            </div>
            <div class="nav__center">
                <img src="{{asset('img/logo.svg')}}" alt="" class="logo"/>
            </div>
            <div class="nav__right">
                <ul class="nav__ul">
                    <li class="nav__li"><a href="{{route('main.review')}}">REVIEWS</a></li>
                    <li class="nav__li"><a href="{{route('main.blog')}}">BLOG</a></li>
                    <li class="nav__li"><a href="{{route('main.index')}}">CONTACT</a></li>
                </ul>
            </div>
            <div class="menu-wrap">
                <input type="checkbox" class="toggler">
                <div class="hamburger">
                    <div></div>
                </div>
                <div class="menu">
                    <div>
                        <div>
                            <ul>
                                <li class="nav__li">HOME</li>
                                <li class="nav__li">PORTFOLIO</li>
                                <li class="nav__li">PACKAGES</li>
                                <li class="nav__li">REVIEWS</li>
                                <li class="nav__li">BLOG</li>
                                <li class="nav__li">CONTACT</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
@yield('content')
<section class="feedback">
    <div class="feedback__container">
        <div class="feedback__text">
            <h4>Let’s create something timeless</h4>
            <p>
                Tell us a bit about your wedding day — where, when, and what you
                dream of. <br/>
                We’ll get back to you within 24 hours to talk details and
                availability.
            </p>
        </div>
        <form action="{{route('feedback.store')}}">
            @csrf
            <div>
                <input type="email" name="email" required placeholder="Enter your email"/>
            </div>
            <div>
                <input type="date" name="date" required placeholder="Enter your date"/>
            </div>
            <button type="submit">sent</button>
        </form>
    </div>
</section>
<footer class="footer">
    <div class="footer__container">
        <div class="footer__right">
            <div class="img">
                <img src="{{asset('img/logo.svg')}}" alt="" class="logo"/>
            </div>

            <p>
                international wedding <br/><br/>
                directory and magazine for all
            </p>
        </div>
        <div class="footer__left">
            <ul>
                <a href="https://www.instagram.com/kudryastudio.es/">

                    <img src="{{asset('img/inst.png')}}" alt=""/>
                    <p> Follow us on instagram</p>
                </a>
                <a href="https://es.pinterest.com/kudriastudio/">
                    <img src="{{asset('img/pin.png')}}" alt=""/>
                    <p>Follow us on pinterest</p>
                </a>
            </ul>
            <div>
                <a href="{{route('main.privacy-policy')}}">Privacy Policy</a>
                <a href="{{route('main.terms-of-use')}}">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
<div class="cookie">
    <div class="cookie__container">
        <p class="cookie__title">Cookie settings</p>
        <p class="cookie__description">
            By clicking "Accept all cookies", you agree to storing cookies on your
            device to enhance site navigation, analyze site usage and assist in
            our marketing efforts as outlined in our
            <a class="cookie__link" href="#">privacy policy</a>
        </p>
        <a class="cookie__btn" href="#" onclick="hide_cookie()"
        >Accept all cookies</a
        >
        <div class="cross" onclick="hide_cookie()">
            <img src="{{asset('/img/cross.svg')}}" alt=""/>
        </div>
    </div>
</div>
<style>

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        #img-viewer {
            display: none;
            position: fixed;
            z-index: 10000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
        }

        #img-viewer .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        #img-viewer .close:hover{
            cursor: pointer;
        }

        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }

        .img-container{
            position:relative;
            width:350px;
        }
        .img-source{
            border:5px solid #ccc;
            border-radius:5px;
            width: 100%;
        }
        .expand-icon{
            position:absolute;
            right:10px;
            top:15px;
            cursor:pointer;
        }

    </style>
<!-- Image Viewer -->
<div id="img-viewer">
    <span class="close" onclick="close_model()">
        <img src="{{asset('./img/cross-white.svg')}}" alt="">
    </span>
    <video controls   class="modal-content" id="full-image"  src=""></video>
</div>
<script type="text/javascript">

    function full_view(ele){
        let src=ele.getAttribute('play')
        document.querySelector("#img-viewer").querySelector(".modal-content").setAttribute("src",src);
        document.querySelector("#img-viewer").style.display="block";
    }

    function close_model(){
        document.querySelector("#img-viewer").style.display="none";
    }
</script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/swiper.js')}}"></script>
<script>
    let swiper = new Swiper(".instSwiper", {
        slidesPerView: 10,
        spaceBetween: 10,
        pagination: false,
        autoplay: {
            delay: 1,
            disableOnInteraction: true,
        },
        freeMode: true,
        speed: 10000,
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P511YDKMW7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-P511YDKMW7');
</script>

{{--<script>--}}
{{--    $('.play').click(function(event) {--}}
{{--        $target = event.target--}}

{{--    });--}}
{{--</script>--}}
</body>
</html>

