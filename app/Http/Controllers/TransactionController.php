<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type' => 'required|in:Credit,Debit',
            
        ]);
        Transaction::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('transactions.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type' => 'required|in:Credit,Debit',
            
        ]);

        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $transaction->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
        ]);
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $transaction->delete();
        return redirect()->route('transactions.index');
    }





    public function credits()
    {
        // $creditTransactions = Transaction::where('user_id', Auth::id())
        //     ->where('type', 'Credit')
        //     ->orderBy('created_at', 'asc')
        //     ->get();
        //     //redirect()->route('Credits.index');
        //     return view('transactions.credits', compact('creditTransactions'));


            $transactions = Transaction::where('user_id', Auth::id())->where('type', 'Credit')->orderBy('created_at', 'asc')->get();
            return view('transactions.credits', compact('transactions'));
    }


    public function debits()
    {
        $transactions = Transaction::where('user_id', Auth::id())->where('type', 'Debit')->orderBy('created_at', 'asc')->get();
            //redirect()->route('Debits.index');
            return view('transactions.debits', compact('transactions'));
    }


}
