<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\ContactMessage;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending_invoices' => Invoice::whereIn('status', ['draft', 'sent'])->count(),
            'pending_quotes' => Quote::where('status', 'pending')->count(),
            'total_contacts' => ContactMessage::count(),
            'unread_contacts' => ContactMessage::where('status', 'unread')->count(),
        ];

        $recent_quotes = Quote::latest()->take(5)->get();
        $recent_contacts = ContactMessage::latest()->take(5)->get();
        $recent_invoices = Invoice::with('quote')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_quotes', 'recent_contacts', 'recent_invoices'));
    }
}
