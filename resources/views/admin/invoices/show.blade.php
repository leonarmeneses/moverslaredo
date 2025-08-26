@extends('admin.layout')

@section('title', 'Invoice ' . $invoice->invoice_number . ' - MoversLaredo Admin')
@section('page-title', 'Invoice ' . $invoice->invoice_number)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Details</h6>
                <span class="badge bg-{{
                    $invoice->status === 'paid' ? 'success' :
                    ($invoice->status === 'overdue' ? 'danger' :
                    ($invoice->status === 'sent' ? 'info' : 'warning'))
                }} fs-6">
                    {{ ucfirst($invoice->status) }}
                </span>
            </div>
            <div class="card-body">
                <!-- Company Header -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4 class="text-primary">Movers Laredo</h4>
                        <p class="mb-0">Professional Moving Services<br>
                        602 W. Calton RD, Laredo, TX 78041<br>
                        Phone: (956) 526-8221<br>
                        Email: quote@moverslaredo.com</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5>INVOICE</h5>
                        <p class="mb-0">
                            <strong>Invoice #:</strong> {{ $invoice->invoice_number }}<br>
                            <strong>Date:</strong> {{ $invoice->invoice_date->format('M d, Y') }}<br>
                            <strong>Due Date:</strong> {{ $invoice->due_date->format('M d, Y') }}
                        </p>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-primary">Bill To:</h6>
                        <p class="mb-0">
                            <strong>{{ $invoice->customer_name }}</strong><br>
                            {{ $invoice->customer_email }}<br>
                            {{ $invoice->customer_phone }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary">Related Quote:</h6>
                        <p class="mb-0">
                            <a href="{{ route('admin.quotes.show', $invoice->quote) }}" class="text-decoration-none">
                                Quote #{{ $invoice->quote_id }}
                            </a><br>
                            <small class="text-muted">{{ $invoice->quote->created_at->format('M d, Y') }}</small>
                        </p>
                    </div>
                </div>

                <!-- Service Description -->
                <div class="mb-4">
                    <h6 class="text-primary">Service Description:</h6>
                    <div class="bg-light p-3 rounded">
                        {{ $invoice->service_description }}
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Description</th>
                                <th width="120" class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Moving Services</td>
                                <td class="text-end">${{ number_format($invoice->subtotal, 2) }}</td>
                            </tr>
                            @if($invoice->tax_amount > 0)
                            <tr>
                                <td>Tax ({{ $invoice->tax_rate }}%)</td>
                                <td class="text-end">${{ number_format($invoice->tax_amount, 2) }}</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <th>Total</th>
                                <th class="text-end">${{ number_format($invoice->total_amount, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Notes -->
                @if($invoice->notes)
                <div class="mb-4">
                    <h6 class="text-primary">Notes:</h6>
                    <div class="bg-light p-3 rounded">
                        {{ $invoice->notes }}
                    </div>
                </div>
                @endif

                <!-- Payment Information -->
                @if($invoice->paid_at)
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <strong>Paid:</strong> {{ $invoice->paid_at->format('M d, Y \a\t g:i A') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Actions</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.invoices.edit', $invoice) }}" class="btn btn-warning w-100 mb-2">
                    <i class="fas fa-edit"></i> Edit Invoice
                </a>

                @if($invoice->status !== 'paid')
                <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" class="mb-2">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="paid">
                    <input type="hidden" name="service_description" value="{{ $invoice->service_description }}">
                    <input type="hidden" name="subtotal" value="{{ $invoice->subtotal }}">
                    <input type="hidden" name="tax_rate" value="{{ $invoice->tax_rate }}">
                    <input type="hidden" name="invoice_date" value="{{ $invoice->invoice_date->format('Y-m-d') }}">
                    <input type="hidden" name="due_date" value="{{ $invoice->due_date->format('Y-m-d') }}">
                    <input type="hidden" name="notes" value="{{ $invoice->notes }}">
                    <button type="submit" class="btn btn-success w-100" onclick="return confirm('Mark this invoice as paid?')">
                        <i class="fas fa-check"></i> Mark as Paid
                    </button>
                </form>
                @endif

                <form action="{{ route('admin.invoices.send-email', $invoice) }}" method="POST" class="mb-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary w-100"
                            onclick="return confirm('Send invoice email to {{ $invoice->customer_email }}?')">
                        <i class="fas fa-envelope"></i> Send Email
                    </button>
                </form>

                <a href="{{ route('admin.quotes.show', $invoice->quote) }}" class="btn btn-outline-info w-100 mb-2">
                    <i class="fas fa-calculator"></i> View Quote
                </a>

                <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100 mb-2" onclick="return confirm('Are you sure you want to delete this invoice?')">
                        <i class="fas fa-trash"></i> Delete Invoice
                    </button>
                </form>

                <a href="{{ route('admin.invoices.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Back to Invoices
                </a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Summary</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <strong>${{ number_format($invoice->subtotal, 2) }}</strong>
                </div>
                @if($invoice->tax_amount > 0)
                <div class="d-flex justify-content-between mb-2">
                    <span>Tax ({{ $invoice->tax_rate }}%):</span>
                    <strong>${{ number_format($invoice->tax_amount, 2) }}</strong>
                </div>
                @endif
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="h6">Total:</span>
                    <strong class="h6 text-primary">${{ number_format($invoice->total_amount, 2) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
