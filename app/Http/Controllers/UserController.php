<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
        {
        $users = User::query();

        if ($request->filled('name')) {
            $users->where('name', 'ILIKE', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $users->where('email', 'ILIKE', '%' . $request->email . '%');
        }

        if ($request->filled('status')) {
            if ($request->status == '1') {
                $users->whereNotNull('email_verified_at');
            } elseif ($request->status == '0') {
                $users->whereNull('email_verified_at');
            }
        }

        $users = $users->paginate(10);

        return view('users.index', compact('users'));
    }
}
