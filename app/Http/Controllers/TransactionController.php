<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request)
    {
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:20',
            'description' => 'required|string|max:100',
            'status' => 'required|string|max:15',
            'total_amount' => 'required|integer',
            'transaction_number' => 'required|string|max:15'
        ]);

        $transaction = new Transaction();
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('showAllTransactions')->with('success', 'Transaction created successfully.');
    }

    public function showTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if (!$transaction)
        {
            return redirect()->route('showAllTransactions')->with('error', 'Transaction not found.');
        }

        return view('transaction', ['transaction' => $transaction]);
    }

    public function editTransaction (Request $request)
    {
        $transaction = Transaction::find($request->id);

        if (!$transaction)
        {
            return redirect()->route('showAllTransactions')->with('error', 'Transaction not found.');
        }

        return view('edit-transaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request)
    {
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:20',
            'description' => 'required|string|max:100',
            'status' => 'required|string|max:15',
            'total_amount' => 'required|integer',
            'transaction_number' => 'required|string|max:15'
        ]);

        $transaction = Transaction::find($request->id);
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('showTransaction', ['id' => $transaction->id])->with('success', 'Transaction created successfully.');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction)
        {
            $transaction->delete();
        }

        return redirect()->route('showAllTransactions')->with('success', 'Transaction deleted successfully.');
    }
}
