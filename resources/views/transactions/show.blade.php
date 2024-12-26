@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Transaction Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User: {{ $transaction->user->name }}</h5>
                <p><strong>Waste:</strong> {{ $transaction->waste->name }}</p>
                <p><strong>Quantity:</strong> {{ $transaction->quantity }}</p>
                <p><strong>Total Price:</strong> {{ $transaction->total_price }}</p>
                <p><strong>Transaction Date:</strong> {{ $transaction->transaction_date }}</p>
            </div>
        </div>

        <a href="{{ route('transactions.index') }}" class="btn btn-primary mt-3">Back to Transactions</a>
    </div>
@endsection
