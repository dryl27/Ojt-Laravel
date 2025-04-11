@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Edit Administrator Item</h2>
        </div>
        <div class="card-body bg-light">
            <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $admin->name }}" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $admin->email }}" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $admin->address }}" required>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
