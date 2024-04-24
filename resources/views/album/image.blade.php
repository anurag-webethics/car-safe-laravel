@extends('layouts.app-layout')

<?php
$title = 'images';
?>

@section('content')

<x-hero-banner></x-hero-banner>

    <div class="center">
        <div class="container my-5 py-5 border rounded-4">
            <form action="{{route('user-image')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileLg" class="form-label">Large file input example</label>
                    <input type="hidden" value="{{$id}}" name="album_id">
                    <input class="form-control form-control-lg" name="image[]" id="formFileLg" multiple="multiple"
                        type="file">
                        <span class="text-danger">
                            @error('image')
                            {{$message}}
                        @enderror
                        </span>
                </div>
               

                <button type="submit" name="upload" class="btn btn-primary my-3 rounded-0 px-5 py-2">Upload</button>
                <p class="text-dark fw-bolder">Upload image will be resized to fit within: <br>
                    Width of 500 pixels and Height of 500 Pixels</p>
            </form>
        </div>
    </div>
@endsection
