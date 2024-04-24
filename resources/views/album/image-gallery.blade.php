@extends('layouts.app-layout')

@section('content')
    <x-hero-banner></x-hero-banner>

    @php

        $title = 'Images';

    @endphp

    <!-- Album  -->
    {{-- {{route('image',['id'=>$id])}} --}}
    <div class="container py-5">
        <div class="text-end pb-3">
            <a href="{{ route('image', ['id' => $id]) }}" class="link-light link-offset-2 link-underline-opacity-0">
                <button type="button" id="file-input-label" for="file-input"
                    class="btn btn-primary text-end rounded-0 px-4 py-2">
                    Add Images
                </button>
            </a>
        </div>

        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ toastr()->addSuccess() }};
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row g-5">
                @foreach ($images as $image)
                    <div class="col-sm-6 mb-3  col-md-6 col-lg-4 mb-sm-0 ">

                        <div class="card border-0" >
                            <a href="{{ route('destroy', ['id' => $image->id]) }}" type="submit" id="delete"
                                class="btn-close cross-close" name="remove" aria-label="Close"
                                onclick="return confirm('Are you want to delete the image?')"></a>
                            <img src="{{ empty($image->images) ? 'images/album-images/404.jpg' : Storage::url($image->images) }}"
                                alt="..." style="height:306px;width:392px">
                        </div>
                    </div>
                @endforeach
                <div class=" mt-5 d-flex justify-content-center">
                    {{ $images->links() }}
                </div>

            </div>
        </div>

    </div>

    <!-- Album -->
@endsection
