@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="waste_id">Waste</label>
                <select name="waste_id" id="waste_id" class="form-control" required>
                    <option value="">Select Waste</option>
                    @foreach($wastes as $waste)
                        <option value="{{ $waste->id }}">{{ $waste->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" min="0.01" required>
            </div>

            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" name="total_price" id="total_price" class="form-control" step="0.01" min="0.01" required>
            </div>

            <div class="form-group">
                <label for="transaction_date">Transaction Date</label>
                <input type="date" name="transaction_date" id="transaction_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Transaction</button>
        </form>
    </div>
@endsection
