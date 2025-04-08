@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        {{ Auth::user()->id}}
                        @php
                            use App\Models\Role;
                            $role = Role::join('role_user','role_user.role_id','roles.id')
                                    ->select('roles.name')
                                    ->where('role_user.user_id',Auth::user()->id)
                                    ->first();
                            @endphp

                        {{   $role->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
