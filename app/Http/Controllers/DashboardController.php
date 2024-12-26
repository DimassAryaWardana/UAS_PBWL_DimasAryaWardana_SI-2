<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waste;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $wastes = Waste::all();
        $transactions = Transaction::with('user', 'waste')->get();

        return view('dashboard', compact('users', 'wastes', 'transactions'));
    }
}
