@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Create New Transaction</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Waste</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Transaction Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->waste->name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->total_price }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $transactions->links() }}
    </div>
@endsection
