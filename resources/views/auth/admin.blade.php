@extends('layouts.app-layout')

@section('content')
    <x-hero-banner></x-hero-banner>

    @php
        $title = 'Admin';
    @endphp

    <!-- profile-form  -->

    <div class="border rounded-4 my-5 mx-auto px-3 profile-form" style="width:80%">
        @if (Auth::user()->role_id > 1)
            <div id="search_list">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            @foreach ($accessibleFields as $fieldHeading)
                                <th scope="col" style="width:15%">{{ $fieldHeading }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody id="searchResult">
                        @foreach ($users as $keys => $user)
                            <tr>
                                @foreach ($accessibleFields as $key => $fieldHeading)
                                    @if ($key == 'name')
                                        <td>{{ implode(' ', $user->$key) }} </td>
                                    @elseif ($key == 'country_id')
                                        <td>{{ $user->country->country }} </td>
                                    @else
                                        <td>{{ $user->$key }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <form action="" id="search-form">
                @csrf
                <div class="col-sm-6 mb-3 mb-sm-0 d-flex flex-column flex-md-row gap-4">
                    <div class="my-4">
                        <h5>Name</h5>
                        <input class="bg-body-tertiary border border-secondary-subtle py-1 fs-5" type="name"
                            name="name" id="name" onfocus="this.value=''">
                    </div>
                    <div class="my-4">
                        <h5>Email</h5>
                        <input class="bg-body-tertiary border border-secondary-subtle py-1 fs-5" type="text"
                            name="email" id="email" onfocus="this.value=''">
                    </div>
                    <div class="my-4">
                        <h5>Gender</h5>
                        <div class="bg-body-tertiary border border-secondary-subtle  d-flex gap-2 py-1 px-3 ">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="gender">
                            <label class="form-check-label fs-5">male</label>
                            </label>
                            <input class="form-check-input" type="radio" name="gender" value="female">
                            <label class="form-check-label fs-5">female</label>
                            </label>
                        </div>
                    </div>
                    <div class="my-4">
                        <h5>Country</h5>
                        <select class="bg-body-tertiary border border-secondary-subtle py-1 fs-2" name="country"
                            id="country">
                            <option value=''>Select Country</option>
                            @foreach ($countries as $country)
                                <option value='{{ $country->id }}'>{{ $country->country }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="my-4">
                        <h5>Hobbies</h5>
                        <div
                            class="bg-body-tertiary border border-secondary-subtle d-flex gap-3 py-1 px-4 flex-column flex-md-row">

                            <input class="form-check-input" type="checkbox" name="hobbies" value="Dancing">
                            <label class="form-check-label fs-5">Dancing</label>
                            </label>

                            <input class="form-check-input" type="checkbox" name="hobbies" value="Singing">
                            <label class="form-check-label fs-5">Singing</label>
                            </label>

                            {{-- <input class="form-check-input" type="checkbox" name="hobbies[]" value="Watching to movies">
                        <label class="form-check-label fs-5">Watching to movies</label> --}}
                            </label>
                        </div>
                    </div>
                    {{-- <div class="my-6">
                    <button type="button" class="btn btn-success rounded-0" style="margin-top: 55px">Search</button>
                </div> --}}
                </div>
            </form>

            <div id="search_list">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%">#</th>
                            <th scope="col" style="width:15%">Name</th>
                            <th scope="col" style="width:15%">Email</th>
                            <th scope="col" style="width:15%">Gender</th>
                            <th scope="col" style="width:20%">Country</th>
                            <th scope="col" style="width:30%">Hobbies</th>
                        </tr>
                    </thead>
                    <tbody id="searchResult">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name[0] }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->country->country }}</td>
                                <td>{{ $user->hobbies }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@push('jquery')
    <script>
        $(document).ready(function() {
            $('#search-form').on('change keyup', function(e) {
                e.preventDefault();
                var query = $('#name').val();
                var email = $('#email').val();
                var country = $('#country').val();
                var gender = $('input[name="gender"]:checked').val();
                var hobbies = [];
                $('input[name="hobbies"]:checked').each(function() {
                    hobbies.push($(this).val());
                });
                $.ajax({
                    url: "search",
                    type: "GET",
                    data: {
                        'search': query,
                        'email': email,
                        'country': country,
                        'gender': gender,
                        'hobbies': hobbies

                    },
                    success: function(data) {
                        let response = JSON.parse(data);
                        let htmlData = '';
                        if (response.status == true) {
                            if (Object.keys(response.data).length > 0) {
                                $.each(response.data, function(index, value) {
                                    let hobby = JSON.parse(value.hobbies);
                                    htmlData += `
                                 <tr>
                                <td> ${value.id} </td>
                                <td> ${value.name} </td>
                                <td> ${value.email} </td>
                                <td> ${value.gender} </td>
                                <td> ${value.country}</td>
                                <td> ${hobby} </td>         
                                </tr>
                               `
                                })
                            } else {
                                htmlData = 'No data found'
                            }

                        }
                        $('#searchResult').html(htmlData);
                    }
                })
            })
            // end of ajax call
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#country').select2({
                theme: "classic"
            });
        });
    </script>
@endpush
