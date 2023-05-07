<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return response()->json($purchases, 200);
    }

    public function show(Purchase $purchase)
    {
        return response()->json($purchase, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
        ]);

        $purchase = Purchase::create($validatedData);

        return response()->json($purchase, 201);
    }

    public function update(Request $request, Purchase $purchase)
    {
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'book_id' => 'sometimes|required|exists:books,id',
            'quantity' => 'sometimes|required|integer|min:1',
            'purchase_date' => 'sometimes|required|date',
        ]);

        $purchase->update($validatedData);

        return response()->json($purchase, 200);
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return response()->json(['message' => 'Purchase deleted successfully'], 200);
    }
}
