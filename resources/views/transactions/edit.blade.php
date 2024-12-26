@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $transaction->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="waste_id">Waste</label>
                <select name="waste_id" id="waste_id" class="form-control" required>
                    <option value="">Select Waste</option>
                    @foreach($wastes as $waste)
                        <option value="{{ $waste->id }}" {{ $transaction->waste_id == $waste->id ? 'selected' : '' }}>{{ $waste->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" min="0.01" value="{{ $transaction->quantity }}" required>
            </div>

            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" name="total_price" id="total_price" class="form-control" step="0.01" min="0.01" value="{{ $transaction->total_price }}" required>
            </div>

            <div class="form-group">
                <label for="transaction_date">Transaction Date</label>
                <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update Transaction</button>
        </form>
    </div>
@endsection
