@extends('layouts.dashboard')

@section('content')
<div class="p-4">
    <h1 class="mb-4">Detail Pengguna</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Dibuat pada</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Diperbarui pada</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
