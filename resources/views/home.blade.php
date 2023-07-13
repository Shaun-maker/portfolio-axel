@extends('layouts.app')

@section('content')

@include('partials._section-intro')

@include('partials._section-presentation')

@include('partials._section-projects')

@auth
    @include('partials._modals')
@endauth

@endsection
