@extends('super-admin.super-admin-layout')

@section('super-admin')
    @php
        $title = 'Edit User Role';
    @endphp
    <div class="container-fluid pt-5">
        <form action="{{ route('edit-user-role',['id'=>$users->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user">User</label><br>
                <input type="text" name="user" class="form-control" value='{{ implode(' ', $users->name) }}'>
                <label class="mt-3" for="user-role">Role</label>
                <select class="form-select mb-2" aria-label="Default select example" name="userole">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : ' ' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                <label class="mt-3 mb-2" for="user-role">Roles-Permissions</label><br>
                @foreach ($permissionFileds as $permission)
                    <input type="checkbox" class="" name="permissions[]" value="{{ $permission->id }}"
                        {{ in_array($permission->id, array_keys($chkFields)) ? 'checked' : ' ' }}>
                    {{ $permission->name }}</input><br>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="/super-admin" type="button" class="btn btn-secondary me-3">Back</a>
                <button type="submit" name="updateRole" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
