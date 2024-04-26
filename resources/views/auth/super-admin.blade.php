@extends('layouts.app-layout')

@section('content')
    <x-hero-banner>
    </x-hero-banner>

    @php
        $title = 'Super Admin';
    @endphp

    <!-- profile-form  -->

    <div class="border rounded-4 my-5 mx-auto px-3 profile-form" style="width:80%">

        <form action="" id="search-form">
            @csrf
            <div class="col-sm-6 mb-3 mb-sm-0 d-flex flex-column flex-md-row gap-5">
                <div class="my-4">
                    <h5>Name</h5>
                    <input class="bg-body-tertiary border border-secondary-subtle py-1 px-4 fs-5" type="name" name="name"
                        id="name" onfocus="this.value=''">
                </div>
            </div>
        </form>


        <div id="search_list">
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th scope="col" style="width:5%">#</th>
                        <th scope="col" style="width:15%">Name</th>
                        <th scope="col" style="width:15%">Email</th>
                        <th scope="col" style="width:20%">Roles</th>
                        <th scope="col" style="width:30%">Permission</th>
                    </tr>
                </thead>
                <tbody id="searchResult" class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ implode(' ', $user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                              @foreach ($permissionFileds as $key => $permissionFiled)
                              @foreach ($user->permission as $key => $permission)
                                  @if ($permission->name == $permissionFiled->name)
                                      <input type="checkbox" checked name="checkbox" id="checkbox">
                                  @else
                                      @continue
                                  @endif
                              @endforeach
                              <input type="checkbox" name="checkbox" id="checkbox">
                              {{ $permissionFiled->name }}
                          @endforeach
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('jquery')
    <script>
        $(document).ready(function() {
            $('#search-form').on('change keyup', function(e) {
                e.preventDefault();
                var query = $('#name').val();
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
                        'country': country,
                        'gender': gender,
                        'hobbies': hobbies,
                    },
                    success: function(data) {
                        let response = JSON.parse(data);
                        let htmlData = '';
                        if (response.status == true) {
                            if (Object.keys(response.data).length > 0) {
                                $.each(response.data, function(index, value) {
                                    htmlData += `
                                 <tr>
                                <th scope="row">${value.id}</th>
                                <td> ${value.name} </td>
                                <td> ${value.email} </td> 
                                <td>${value.rolename}</td>
                                <td>${value.permissionrole}</td>
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
