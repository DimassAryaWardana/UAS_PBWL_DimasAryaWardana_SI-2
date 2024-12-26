<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Waste;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'waste'])->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $wastes = Waste::all();
        return view('transactions.create', compact('users', 'wastes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_id' => 'required|exists:wastes,id',
            'quantity' => 'required|numeric|min:0.01',
            'total_price' => 'required|numeric|min:0.01',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create([
            'user_id' => $request->user_id,
            'waste_id' => $request->waste_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'waste'])->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $users = User::all();
        $wastes = Waste::all();
        return view('transactions.edit', compact('transaction', 'users', 'wastes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_id' => 'required|exists:wastes,id',
            'quantity' => 'required|numeric|min:0.01',
            'total_price' => 'required|numeric|min:0.01',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update([
            'user_id' => $request->user_id,
            'waste_id' => $request->waste_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully deleted.');
    }
}
