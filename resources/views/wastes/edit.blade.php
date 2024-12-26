@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit Waste</h1>
    <form action="{{ route('wastes.update', $waste->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Waste Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $waste->name }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $waste->category }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $waste->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
