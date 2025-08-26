<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Mail\QuoteEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(15);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,quoted,completed',
            'quoted_amount' => 'nullable|numeric|min:0',
            'admin_notes' => 'nullable|string'
        ]);

        $quote->update($validated);

        return back()->with('success', 'Quote updated successfully!');
    }

    public function sendEmail(Quote $quote)
    {
        try {
            // Send email with quote PDF
            Mail::to($quote->email)->send(new QuoteEmail($quote));

            return back()->with('success', 'Quote email sent successfully to ' . $quote->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
