@extends('super-admin.super-admin-layout')

@section('super-admin')
    @php
        $title = 'Super Admin';
    @endphp

    <div class="p-5">

        @if (!empty('addPermission'))
            @error('addPermission')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        @else
            @error('role')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        @endif

        <div class="d-flex justify-content-between">
            <h1>Manage user</h1>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Create permission
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Manage role
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Role</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('add.role') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="role">Role</label><br>
                                <input type="text" name="role" id="role" class="form-control mb-3"
                                    placeholder="Add new role...">
                                <label for="permission" class="me-3">Permission</label><br>
                                @foreach ($permissionFileds as $permissions)
                                    <input type="checkbox" name="permissions[]" id="permission"
                                        value="{{ $permissions->id }}">
                                    <label for="permission" class="me-3">{{ $permissions->name }}</label>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addRole" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add new permission</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('add.role') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user">Permission</label><br>
                                <input type="text" name="addPermission" id="addPermissions" class="form-control mb-3">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="createPermission" class="btn btn-primary">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ toastr()->addSuccess() }};
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table" style="width:100%">
            <thead>
                <tr>
                    <th scope="col" style="width:10%">Id</th>
                    <th scope="col" style="width:15%">Name</th>
                    <th scope="col" style="width:15%">Email</th>
                    <th scope="col" style="width:15%">Roles</th>
                    <th scope="col" style="width:15%">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (!empty($users))
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ implode(' ', $user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td><button class="btn btn-primary me-2">View</button><button class="btn btn-success me-2"
                                    onclick="window.location.href = '{{ route('update.role', ['id' => $user->id]) }}'">Edit</button>
                                <a href='{{ route('delete.user_role', ['id' => $user->id]) }}' class="btn btn-danger"
                                    onclick="return confirm('Are you want to delete the user?')" type='submit'>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>
@endsection


{{-- 
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
@endpush --}}
