@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Wastes List</h1>
    <a href="{{ route('wastes.create') }}" class="btn btn-primary mb-3">Add New Waste</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wastes as $waste)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $waste->name }}</td>
                    <td>{{ $waste->category }}</td>
                    <td>{{ $waste->price }}</td>
                    <td>
                        <a href="{{ route('wastes.show', $waste->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('wastes.edit', $waste->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('wastes.destroy', $waste->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $wastes->links() }}
</div>
@endsection
