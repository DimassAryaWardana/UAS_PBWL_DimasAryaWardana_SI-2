@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Create Waste</h1>
    <form action="{{ route('wastes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Waste Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price/Kg</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
