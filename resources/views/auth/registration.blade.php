@extends('layouts.app-layout')

@section('content')
    @php
        $title = 'Registration Page';
    @endphp

    <!-- sign-up  -->
    <div class="container login-form">

        <div class="row  justify-content-center g-1 gap-2">

            <div class="col col-sm-12 col-lg-7 form-img">
                <img src="images/Registration/Group 1597882533 (1).png" class="img-fluid" alt="..." height="90%"
                    width="90%">
            </div>

            <div class="col col-sm-12 col-lg-4 form">

                @error('error')
                    {{$message}}
                @enderror

                <form action="{{ route('create-user') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center flex-column">

                        <h3 class=" fs-2 fw-bold">Signup to your account</h3>

                        <div class="mb-3">
                            <label for="firstName" class="form-label pt-4 text-secondary fw-bold fs-6">First
                                Name</label>

                            <div class="login-input border d-flex p-2 align-items-center">
                                <img src="images/Registration/Vector.png" class=" login-logo mx-1" alt=""
                                    height="21" width="25">
                                <input type="text" name="firstName" value="{{ old('firstName') }}"
                                    class="form-control d-block fs-5 rounded-0 input border border-0 
                                    @error('firstName')
                                        is-invalid
                                   @enderror"
                                    id="firstName" placeholder="Johan">
                            </div>
                            <span class="text-danger">
                                @error('firstName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label  text-secondary fw-bold fs-6">Last
                                Name</label>

                            <div class="login-input border d-flex p-2 align-items-center">
                                <img src="images/Registration/Vector.png" class=" login-logo mx-1" alt=""
                                    height="21" width="25">
                                <input type="text"
                                    class="form-control d-block fs-5 @error('lastName')
                                is-invalid
                            @enderror  rounded-0  input border border-0"
                                    id="lastName" name="lastName" placeholder="Deo" value="{{ old('lastName') }}">
                            </div>
                            <span class="text-danger">
                                @error('lastName')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary fw-bold fs-6">E-mail</label>
                            <div class="login-input border d-flex p-2 align-items-center">
                                <img src="images/login/Suche.png" class=" login-logo mx-1" alt="" height="21"
                                    width="25">
                                <input type="text"
                                    class="form-control d-block @error('email')
                                is-invalid
                            @enderror fs-5  rounded-0  input border border-0"
                                    id="exampleInputEmail13" name="email" placeholder="example.com"
                                    value="{{ old('email') }}">
                            </div>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-secondary fw-bold fs-6">Password</label>
                            <div class="login-input border d-flex p-2 align-items-center">
                                <img src="images/login/Suche (1).png" class=" login-logo mx-1" alt="" height="14"
                                    width="26">
                                <input type="password"
                                    class="form-control @error('password')
                                is-invalid
                            @enderror d-block fs-5 rounded-0  input border border-0"
                                    name="password" placeholder="Enter passwords" value="{{ old('password') }}">
                                <img src="images/login/Suche (2).png" class="ms-auto ps-2" alt="">
                            </div>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label  text-secondary fw-bold fs-6">Country</label>

                            <div class="login-input border d-flex p-2 align-items-center">
                                <img src="images/Registration/Vector (1).png" class=" login-logo mx-1" alt=""
                                    height="21" width="25">
                                <select
                                    class="form-select @error('country')
                                is-invalid
                            @enderror border-0 fs-5"
                                    aria-label="Default select example" name="country">
                                    <option value="">Select your country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country') == $country->id ? 'selected' : '' }}>
                                            {{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-1">
                            <label for="gender" class="form-label  text-secondary fw-bold fs-6">Gender</label>

                            <div class="login-input d-flex gap-2">
                                <input class="form-check-input" type="radio" name="gender" value="male"
                                    {{ old('gender') == 'male' ? 'checked' : '' }} id="flexRadioDefault1">
                                <label class="form-check-label text-secondary fw-bold fs-6" for="flexRadioDefault1">
                                    Male
                                </label>
                                <input class="form-check-input ms-2" type="radio" name="gender" value="female"
                                    @if (old('gender') == 'female') checked @endif id="flexRadioDefault12">
                                <label class="form-check-label text-secondary fw-bold fs-6" for="flexRadioDefault1">
                                    Female
                                </label>
                            </div>
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label  text-secondary fw-bold fs-6">Hobbies</label>
                            <div class="login-input d-flex gap-4">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]"
                                            value="Listening to music" id="flexCheckDefault1"
                                            {{ old('hobbies') && in_array('Listening to music', old('hobbies')) ? 'checked' : '' }}>
                                        <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                            Listening to music
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Dancing"
                                            id="flexCheckDefault2"
                                            {{ old('hobbies') && in_array('Dancing', old('hobbies')) ? 'checked' : '' }}>
                                        <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                            Dancing
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]"
                                            value="Watching to movies" id="flexCheckDefault3"
                                            {{ old('hobbies') && in_array('Watching to movies', old('hobbies')) ? 'checked' : '' }}>
                                        <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                            Watching to movies
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing"
                                            id="flexCheckDefault4"
                                            {{ old('hobbies') && in_array('Singing', old('hobbies')) ? 'checked' : '' }}>
                                        <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                            Singing
                                        </label>
                                    </div>
                                </div>
                            </div><br>
                            <span class="text-danger">
                                @error('hobbies')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="mb-3 form-check pt-3 pb-3">
                            <input type="checkbox" name="condition" class="form-check-input rounded-1 p-2 border border-2 border-secondary"
                                id="exampleCheck18">
                            <label class="form-check-label text-secondary fw-bold fs-6 lh-base ps-1 pt-1"
                                for="exampleCheck1">I have
                                read the <a href="./forms/login.html"
                                    class="link-dark link-offset-2 link-underline-opacity-50 link-underline-secondary">Terms
                                    & Conditions</a>
                            </label>
                        </div>
                        <button type="submit" name="submit"
                            class="btn btn-primary rounded-0 btn-lg login-form-btn rounded-1 form-btn fw-bold border-0">Sign
                            Up</button>
                        <button type="button"
                            class="btn text-black fw-bold fs-5 btn-outline-secondary rounded-1 mt-3 btn-lg form-btn" onclick="window.location.href = '{{ route('google-auth') }}'">
                            <img src="images/login/icons8-google-48.png" alt="" height="28">
                            Continue
                            with Google
                        </button>
                        <div class="pt-3 ">
                            <p class="text-black fw-bold fs-5">Don't have an account yet? <a href="{{route('login')}}"
                                    class="link-primary link-offset-2 fw-bold link-underline-opacity-0">Sign In</a></p>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
