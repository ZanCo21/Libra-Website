@extends('layouts.error.layout')
@section('title', 'error')
@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Forbidden :(</h2>
        <p class="mb-4 mx-2">Oops! 😖 <span class="text-uppercase">{{ __($exception->getMessage() ?: 'Forbidden') }}</span></p>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
        <div class="mt-3">
            <img src="{{ asset('assets/img/illustrations/403.svg')}}" alt="page-misc-error-light" width="500"
            class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png" />
        </div>
        <a href="http://www.freepik.com">Designed by stories / Freepik</a>
    </div>
</div>
<!-- /Error -->
@endsection