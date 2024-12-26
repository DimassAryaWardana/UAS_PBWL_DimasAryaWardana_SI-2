@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>
    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Users</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="wastes-tab" data-bs-toggle="tab" data-bs-target="#wastes" type="button" role="tab" aria-controls="wastes" aria-selected="false">Wastes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab" aria-controls="transactions" aria-selected="false">Transactions</button>
        </li>
    </ul>
    <div class="tab-content mt-4" id="dashboardTabsContent">
        <!-- Users Tab -->
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h3>Users</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created on</th>
                        <th>Updated on</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Wastes Tab -->
        <div class="tab-pane fade" id="wastes" role="tabpanel" aria-labelledby="wastes-tab">
            <h3>Wastes</h3>
            <a href="{{ route('wastes.create') }}" class="btn btn-primary mb-3">Add New Waste</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price/Kg</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wastes as $waste)
                    <tr>
                        <td>{{ $waste->id }}</td>
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
        </div>
        <!-- Transactions Tab -->
        <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
            <h3>Transactions</h3>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add New Transaction</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Waste</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->waste->name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->total_price }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
