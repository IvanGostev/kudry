@extends('layouts.app')
@section('content')
    <section class="blog-top" style="padding-bottom: 45px">
        <div class="blog-top__container">
            <p class="blog-top__category">{{$post->category()->title}} / {{$post->subcategory()->title}}</p>
            <h5 class="blog-top__title">
                {{$post->top_title}}
            </h5>
            <p class="blog-top__desciption">
                {{$post->top_description}}
            </p>
            <div class="blog-top__photos">
                @foreach($post->images('top') as $image)
                    <div class="blog-top__photo">
                        <img src="{{asset('storage/' . $image->patch)}}" alt=""/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--    <section class="blog-main">--}}
    {{--        <div class="blog-main__container">--}}
    {{--            <p></p>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    @foreach($post->blocks() as $block)
        <section class="final-gallery" style="padding: 45px 0">
            <div class="final-gallery__container">
                <h4 class="final-gallery__title">{{$block->title}}</h4>
                <p class="final-gallery__description">
                    {{$block->description}}
                </p>
                <div class="photos">
                    @foreach($block->images() as $image)
                        <div class="photo">
                            <img src="{{asset('storage/' . $image->patch)}}" alt=""/>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
    <section class="final-gallery" style="padding-top: 45px">
        <div class="final-gallery__container">
            <h4 class="final-gallery__title">{{$post->bottom_title}}</h4>
            <p class="final-gallery__description">
                {{$post->bottom_description}}
            </p>
            <div class="photos">
                @foreach($post->images('bottom') as $image)
                    <div class="photo">
                        <img src="{{asset('storage/' . $image->patch)}}" alt=""/>
                    </div>
                @endforeach
            </div>
            <p class="final-gallery__end">
                {{$post->caption}}
            </p>
        </div>
    </section>
    <section class="blog">
        <div class="blog__container">
            <h4 class="blog__title">Related</h4>
            <div class="posts">
                @foreach($posts_related as $postActive)
                    <div class="post">
                        <div class="img">
                            <img src="{{asset('storage/'. $postActive->img)}}" alt=""/>
                        </div>
                        <p class="post__category">
                            <a style="color: #a3a3a3;"
                               href="{{route('main.blog', ['category_id'=> $postActive->category_id])}}">{{$postActive->category()->title}}</a>
                            / <a style="color: #a3a3a3;"
                                 href="{{route('main.blog', ['category_id'=> $postActive->category_id, 'subcategory_id'=>$postActive->sub_category_id])}}">{{$postActive->subcategory()->title}}</a>
                        </p>
                        <a class="post__title" href="{{route('main.post', ['post' => $postActive->id, 'slug' => $postActive->slug])}}" style="display:block">
                            {{$postActive->top_title}}
                        </a>
                        <p class="post__text" >
                            {{$postActive->top_description}}
                        </p>
                        <p class="post__date">{{$postActive->created_at->format('d M Y')}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="blog" style="padding: 0 0 30px 0">
        <div class="blog__container">
            <h4 class="blog__title">Popular</h4>
            <div class="posts">
                @foreach($posts_popular as $postActive)
                    <div class="post">
                        <div class="img">
                            <img src="{{asset('storage/'. $postActive->img)}}" alt=""/>
                        </div>
                        <p class="post__category">
                            <a style="color: #a3a3a3;"
                               href="{{route('main.blog', ['category_id'=>$postActive->category_id])}}">{{$postActive->category()->title}}</a>
                            / <a style="color: #a3a3a3;"
                                 href="{{route('main.blog', ['category_id'=>$postActive->category_id, 'subcategory_id'=>$postActive->sub_category_id])}}">{{$postActive->subcategory()->title}}</a>
                        </p>
                        <a class="post__title" href="{{route('main.post', ['post' => $postActive->id, 'slug' => $postActive->slug])}}" style="display:block">
                            {{$postActive->top_title}}
                        </a>
                        <p class="post__text">
                            {{$postActive->top_description}}
                        </p>
                        <p class="post__date">{{$postActive->created_at->format('d M Y')}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
