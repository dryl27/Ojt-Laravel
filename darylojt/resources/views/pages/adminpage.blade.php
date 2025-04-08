Hello this is Administrator Page

{{Auth::user()->id}}
    @php
        use App\Models\Role;
        $role = Role::join('role_user','role_user.role_id','roles.id')
            ->select('roles.name')
            ->where('role_user.user_id',Auth::user()->id)
            ->first();
    @endphp

{{$role->name}}