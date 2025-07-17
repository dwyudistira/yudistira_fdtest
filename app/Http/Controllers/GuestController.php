<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $query = Books::query();

        if ($request->filled('title')) {
            $query->where('title', 'ILIKE', '%' . $request->title . '%');
        }

        if ($request->filled('author')) {
            $query->where('author', 'ILIKE', '%' . $request->author . '%');
        }

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $books = $query->latest()->paginate(9)->withQueryString();

        return view("guest", compact('books'));
    }
}
