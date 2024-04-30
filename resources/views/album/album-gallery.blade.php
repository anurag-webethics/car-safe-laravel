@extends('layouts.app-layout')

@section('content')
    <x-hero-banner></x-hero-banner>

    <?php
    $title = 'Album';
    ?>

    <!-- Album  -->

    <div class="container py-5">
        <div class="text-end pb-3">
            <a href="{{ route('user-album') }}" class="link-light link-offset-2 link-underline-opacity-0">
                <button type="button" class="btn btn-primary text-end rounded-0 px-4 py-2">
                    Add Album
                </button>
            </a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                {{ Session::get('message') }}
                @php
                    session::forget('message');
                @endphp
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="container">
            <div class="row g-5">
                @foreach ($albums as $album)
                    <div class="col-sm-6 mb-3  col-md-6 col-lg-4 mb-sm-0">
                        <a href="{{ route('image-gallery', ['id' => $album->id]) }}"
                            class="link-light link-offset-2 link-underline-opacity-0">

                            <div class="card border-0">
                                <img src="{{ empty($album->album_cover) ? 'images/album-images/404.jpg' : Storage::url($album->album_cover) }}"
                                    alt="..." style="height:306px;width:392px">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $album->album_name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Album  -->
@endsection
