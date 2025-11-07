@extends('layouts.app')
@section('content')
    <section class="blog">
        <div class="blog__container">
            <form class="blog__navigation" action="#">
                <button class="{{$category_id == 'all' ? 'active' : ''}}" type="submit" name="category_id" value="all">
                    View All
                </button>
                @foreach($categories as $category)
                    <button type="submit" name="category_id" class="{{$category_id == $category->id ? 'active' : ''}}"
                            value="{{$category->id}}">{{$category->title}}</button>
                @endforeach()
            </form>
            @if($subcategories)
                <form class="blog__navigation" action="#" style="padding: 0;
    margin: -35px 0 50px 0;">
                    <input type="text" hidden name="category_id" value="{{$category_id}}">
                    @foreach($subcategories as $subcategory)
                        <button type="submit" name="subcategory_id"
                                class="{{$subcategory_id == $subcategory->id ? 'active' : ''}}"
                                value="{{$subcategory->id}}">{{$subcategory->title}}</button>
                    @endforeach()
                </form>
            @endif
            <div class="posts">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="img">
                            <img src="{{asset('storage/'. $post->img)}}" alt=""/>
                        </div>
                        <p class="post__category">
                            <a style="color: #a3a3a3;"
                               href="{{route('main.blog', ['category_id'=>$post->category_id])}}">{{$post->category()->title}}</a>
                            / <a style="color: #a3a3a3;"
                                 href="{{route('main.blog', ['category_id'=>$post->category_id, 'subcategory_id'=>$post->sub_category_id])}}">{{$post->subcategory()->title}}</a>
                        </p>
                        <a class="post__title" href="{{route('main.post', ['post' => $post->id, 'slug' => $post->slug])}}" style="display:block">
                            {{$post->top_title}}
                        </a>
                        <p class="post__text">
                            {{$post->top_description}}
                        </p>
                        <p class="post__date">{{$post->created_at->format('d M Y')}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
