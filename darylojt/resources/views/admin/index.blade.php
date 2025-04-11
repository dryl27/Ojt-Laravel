@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h2>Administrator Dashboard</h2>
        </div>
        <div class="card-body bg-light">
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Create New</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $index => $admin)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->address }}</td>
                            <td>
                                <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-sm btn-info">Show</a>
                                <!-- Edit button -->
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <!-- Delete form -->
                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this administrator?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No administrators found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
