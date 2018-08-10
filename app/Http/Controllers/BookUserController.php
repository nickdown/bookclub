<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookUserController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $book = Book::findOrFail($request->book);

        $user->books()->syncWithoutDetaching($book);

        return redirect("/home");
    }

    public function update(Request $request, Book $book)
    {
        $user = auth()->user();
        
        if ($request->has('status')) {
            $user->books()->updateExistingPivot($book, [
                'status' => $request->input('status')
            ]);
        }

        if ($request->has('rating')) {
            $user->books()->updateExistingPivot($book, [
                'rating' => $request->input('rating')
            ]);
        }
        
        return redirect()->back();
    }
}
