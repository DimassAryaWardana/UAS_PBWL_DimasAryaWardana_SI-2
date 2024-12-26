@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Waste Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $waste->name }}</h5>
            <p class="card-text">Category: {{ $waste->category }}</p>
            <p class="card-text">Price/Kg: {{ $waste->price }}</p>
            <a href="{{ route('wastes.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
