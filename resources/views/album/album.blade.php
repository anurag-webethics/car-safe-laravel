@extends('layouts.app-layout')

@section('content')
    <x-hero-banner></x-hero-banner>

    <?php
    $title = 'Album';
    ?>

    <!-- upload data -->

    <div class="center">
        <div class="container my-5 py-5 border rounded-4">
            <form action="{{ route('user.album') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Album Name</label>
                    <input type="text" name="album_name" class="form-control bg-body-tertiary py-3 ps-3 fs-6 "
                        id="exampleInput" value="{{ old('album_name') }}" placeholder="Enter Your Album Name">
                    <span class="text-danger">
                        @error('album_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="formFileLg" class="form-label">Large file input example</label>
                    <input class="form-control form-control-lg" value="{{ old('album_image') }}" name="album_image"
                        id="formFileLg" type="file">
                    <span class="text-danger">
                        @error('album_image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" name="upload" class="btn btn-primary my-3 rounded-0 px-5 py-2">Upload</button>
                <p class="text-dark fw-bolder">Upload image will be resized to fit within: <br>
                    Width of 500 pixels and Height of 500 Pixels</p>
            </form>
        </div>
    </div>

    <!-- upload data -->
@endsection
