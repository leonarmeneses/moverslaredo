<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quote');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'move_date' => 'required|date',
            'from_address' => 'required|string',
            'to_address' => 'required|string',
            'move_type' => 'required|string|in:Studio Apt,1 BR,1 BR Apt - Large,2 BR Apt,3 BR Apt,4+ BR Apt,House,Commercial move',
            'message' => 'nullable|string'
        ]);

        Quote::create($validated);

        return back()->with('success', 'Quote request submitted successfully!');
    }
}
