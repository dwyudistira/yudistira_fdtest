<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $books = Books::where('user_id', $userId)->get();

        $totalBooks = $books->count();

        $rataRataRating = $books->avg('rating');

        return view('dashboard', [
            'totalBooks' => $totalBooks,
            'rataRataRating' => number_format($rataRataRating ?? 0, 2)
        ]);
    }
}
