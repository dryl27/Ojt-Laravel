@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white">
            <h2>Admin Details</h2>
        </div>
        <div class="card-body bg-light">
            <div class="mb-3">
                <strong>Name:</strong>
                <p>{{ $admin->name }}</p>
            </div>

            <div class="mb-3">
                <strong>Email:</strong>
                <p>{{ $admin->email }}</p>
            </div>

            <div class="mb-3">
                <strong>Address:</strong>
                <p>{{ $admin->address }}</p>
            </div>

            <!-- Add more fields here if needed -->

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
