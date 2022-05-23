@extends('layouts.app')

@section('title') Home @endsection

@section('content')
    @if(Auth::check())
        @include('pages._dashboard')
        @include('pages._recent_characters')
    @else
        @include('pages._logged_out')
    @endif
@endsection

@section('sidebar')
    @if(Auth::check())
        @include('pages._left')
    @endif
@endsection

@section('right')
    @if(Auth::check())
        @include('pages._right')
    @endif
@endsection
