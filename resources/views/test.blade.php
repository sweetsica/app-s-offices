@if ($role->permissions)
@foreach ($role->permissions as $role_permission)

        <button type="submit">{{ $role_permission->name }}</button>

@endforeach
@endif
