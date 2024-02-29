<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function deleteTransaction(Transaction $transaction){
        $transaction->delete();
        return redirect('/');
    }
    public function createTransaction(Request $request) {
        $incomingFields = $request->validate([
            'transaction_type' => ['required', 'in:Recebeu,Pagou'],
            'value' => ['required'],
            'category_id' => ['required']
        ]);

        $incomingFields['user_id'] = auth()->id();
        Transaction::create($incomingFields);
        return redirect('/');
    }
}
