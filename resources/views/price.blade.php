@extends('layouts.app')
@section('content')
    <object  style="margin-top: 100px" data="{{asset('files/price.pdf#toolbar=0')}}"  width="100%" height="4200px">
    </object>
@endsection
