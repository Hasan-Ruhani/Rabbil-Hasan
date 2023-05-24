@extends('layout.app');

@section('content');
    @include('component.sidebar');
    @include('component.header');
    @include('component.fiveArt');
    @include('component.service');
    @include('component.pricing');
    @include('component.cta');
    @include('component.news');
    @include('component.brand');
    @include('component.contact');
    @include('component.map');
@endsection