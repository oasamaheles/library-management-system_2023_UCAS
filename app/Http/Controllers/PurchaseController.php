<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function buy(Request $request, Book $book)
    {
        // Check if book is available for purchase
        if (!$book->isAvailableForPurchase()) {
            return redirect()->back()->withErrors('This book is currently not available for purchase.');
        }

        // Check if user is authenticated
        if (!$request->user()) {
            return redirect()->route('login')->withErrors('You need to be logged in to purchase a book.');
        }

        // Create new purchase record
        $purchase = new Purchase();
        $purchase->book_id = $book->id;
        $purchase->user_id = $request->user()->id;
        $purchase->price = $book->price;
        $purchase->save();

        // Decrease book stock
        $book->decreaseStock();

        // Redirect to user profile with success message
        return redirect()->route('user.profile')->withSuccess('Thank you for purchasing ' . $book->title . '.');
    }
}
