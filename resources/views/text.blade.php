@extends('layouts.app')
@section('content')
    <section class="text">
        <div class="text__container">
            <h1 class="text__title">
                @if($text->key == 'privacy-policy')Privacy policy @endif
                @if($text->key == 'terms-of-use')Terms of use @endif
            </h1>
            <p class="text__description">
                {{$text->text}}
            </p>
        </div>
    </section>
@endsection
