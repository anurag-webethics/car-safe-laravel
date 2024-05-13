@extends('layouts.app-layout')

@section('content')
    <x-hero-banner></x-hero-banner>

    @php
        $title = 'Edit Profile';
    @endphp

    <!-- profile-form  -->

    <div class="container border rounded-4 my-5 px-3 profile-form">

        <div class="profile-form-bg">
            <img src="images/profile-form-images/gallery.png" alt="">
        </div>

        <form action="{{ route('profile.update', ['id' => $userDetail->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex profile-edit justify-content-between align-items-center flex-wrap py-5">
                <div class="d-flex profile-name gap-4 align-items-center flex-wrap ">
                    <div class=" profile-form-img text-center">
                        <span id="editImage">
                            <img src="{{ empty($userDetail->profile_img) ? 'images/profile-form-images/gallery.png' : Storage::url($userDetail->profile_img) }}"
                                alt="" width="100%" id="editImage" class="rounded-circle">
                        </span>
                    </div>
                    <div class="">
                        <h5 class="text-dark fw-bold">{{ implode(' ', $userDetail->name) }}</h5>
                        <p>{{ $userDetail->email }}</p>
                    </div>
                </div>
                <div>
                    <input type="file" name='profileImg' id="file-input" />
                    <label class="btn btn-primary px-4 py-2 fw-bold" id="file-input-label" for="file-input">
                        Edit
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">FIRST Name</label>
                        <input type="text" class="form-control bg-body-tertiary py-3 ps-3 fs-6" name="firstName"
                            id="exampleInputEmail1" placeholder="Your first name" value='{{ $userDetail->name[0] }}'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">LAST Name</label>
                        <input type="text" name="lastName" class="form-control bg-body-tertiary py-3 ps-3 fs-6"
                            id="exampleInputEmail11" placeholder="Your last name" value='{{ $userDetail->name[1] }}'>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Country</label>
                        <select class="form-select fs-5 bg-body-tertiary py-3 ps-3 fs-6" aria-label="Default select example"
                            name="country">
                            @foreach ($countries as $country)
                                <option value='{{ $country->id }}'
                                    {{ $userDetail->country_id == $country->id ? 'selected' : '' }}>{{ $country->country }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">

                        <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Gender</label>
                        <div class="form-control bg-body-tertiary d-flex gap-2 py-3 ps-3 ">

                            <input class="form-check-input" type="radio" name="gender" value="male"
                                {{ $userDetail->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold fs-6">male</label>
                            </label>

                            <input class="form-check-input" type="radio" name="gender" value="female"
                                {{ $userDetail->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold fs-6">female</label>
                            </label>

                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Hobbies</label>
                    <div
                        class="form-contro d-flex  flex-md-row flex-column gap-4 form-control bg-body-tertiary py-3 ps-3 fs-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" value="Listening to music"
                                id="flexCheckDefault1"
                                {{ str_contains($userDetail->hobbies, 'Listening to music') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                Listening to music
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" value="Dancing"
                                id="flexCheckDefault2"
                                {{ str_contains($userDetail->hobbies, 'Dancing') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                Dancing
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" value="Watching to movies"
                                id="flexCheckDefault3"
                                {{ str_contains($userDetail->hobbies, 'Watching to movies') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                Watching to movies
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing"
                                id="flexCheckDefault4"
                                {{ str_contains($userDetail->hobbies, 'Singing') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault">
                                Singing
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="py-5 email-heading">
                <h5 class="text-dark fw-bold ">My email Address</h5>
                <div class="d-flex profile-name gap-3 align-items-center flex-wrap pt-3">
                    <div class="rounded-circle bg-info-subtle profile-email text-center">
                        <img src="../images/profile-form-images/sms.png" alt="">
                    </div>
                    <div class="">
                        <p class="text-dark fs-5">{{ $userDetail->email }}</p>
                        <p class="text-secondary">1 month ago</p>
                    </div>
                </div>
                <button type="button" class="btn bg-info-subtle text-primary px-4 py-2">+Add Email Address</button>
            </div>
            <button type="submit" name="update"
                class="btn btn-primary border-0 mb-4 fw-semibold rounded-0 btn-box">Update</button>
        </form>
    </div>

    <!-- profile-form -->
    @push('script')
        <script>
            document.getElementById('file-input').addEventListener('change', function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imagePreview = document.getElementById('editImage');
                    imagePreview.innerHTML = '<img src="' + e.target.result +
                        '" width="100%"  alt="Image Preview" class="rounded-circle" />';
                };
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endpush
@endsection
