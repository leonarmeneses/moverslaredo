<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\Invoice;
use App\Mail\InvoiceEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('quote')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create(Quote $quote)
    {
        // Check if quote already has an invoice
        if ($quote->invoice) {
            return redirect()->route('admin.invoices.show', $quote->invoice)
                ->with('info', 'This quote already has an invoice.');
        }

        return view('admin.invoices.create', compact('quote'));
    }

    public function store(Request $request, Quote $quote)
    {
        $request->validate([
            'service_description' => 'required|string|max:1000',
            'subtotal' => 'required|numeric|min:0',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Calculate tax and total
        $subtotal = $request->subtotal;
        $taxRate = $request->tax_rate;
        $taxAmount = ($subtotal * $taxRate) / 100;
        $totalAmount = $subtotal + $taxAmount;

        // Generate invoice number
        $invoiceNumber = $this->generateInvoiceNumber();

        $invoice = Invoice::create([
            'quote_id' => $quote->id,
            'invoice_number' => $invoiceNumber,
            'customer_name' => $quote->name,
            'customer_email' => $quote->email,
            'customer_phone' => $quote->phone,
            'service_description' => $request->service_description,
            'subtotal' => $subtotal,
            'tax_rate' => $taxRate,
            'tax_amount' => $taxAmount,
            'total_amount' => $totalAmount,
            'status' => 'draft',
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Invoice created successfully!');
    }

    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'service_description' => 'required|string|max:1000',
            'subtotal' => 'required|numeric|min:0',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:draft,sent,paid,overdue',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Calculate tax and total
        $subtotal = $request->subtotal;
        $taxRate = $request->tax_rate;
        $taxAmount = ($subtotal * $taxRate) / 100;
        $totalAmount = $subtotal + $taxAmount;

        $invoice->update([
            'service_description' => $request->service_description,
            'subtotal' => $subtotal,
            'tax_rate' => $taxRate,
            'tax_amount' => $taxAmount,
            'total_amount' => $totalAmount,
            'status' => $request->status,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'notes' => $request->notes,
            'paid_at' => $request->status === 'paid' ? now() : null
        ]);

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice deleted successfully!');
    }

    private function generateInvoiceNumber()
    {
        $year = date('Y');
        $month = date('m');
        $lastInvoice = Invoice::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->orderBy('id', 'desc')
                            ->first();

        $sequence = $lastInvoice ? intval(substr($lastInvoice->invoice_number, -4)) + 1 : 1;

        return 'INV-' . $year . $month . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    public function sendEmail(Invoice $invoice)
    {
        try {
            // Send email with invoice PDF
            Mail::to($invoice->customer_email)->send(new InvoiceEmail($invoice));

            return back()->with('success', 'Invoice email sent successfully to ' . $invoice->customer_email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
