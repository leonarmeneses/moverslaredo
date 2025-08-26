@extends('admin.layout')

@section('title', 'Edit Invoice ' . $invoice->invoice_number . ' - MoversLaredo Admin')
@section('page-title', 'Edit Invoice ' . $invoice->invoice_number)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit Invoice Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="date" class="form-control" id="invoice_date" name="invoice_date"
                                   value="{{ $invoice->invoice_date->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date"
                                   value="{{ $invoice->due_date->format('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="service_description" class="form-label">Service Description</label>
                        <textarea class="form-control" id="service_description" name="service_description" rows="4"
                                  placeholder="Describe the moving services provided..." required>{{ $invoice->service_description }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="subtotal" class="form-label">Subtotal ($)</label>
                            <input type="number" step="0.01" class="form-control" id="subtotal" name="subtotal"
                                   value="{{ $invoice->subtotal }}" placeholder="0.00" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tax_rate" class="form-label">Tax Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate"
                                   value="{{ $invoice->tax_rate }}" placeholder="0.00" required>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="draft" {{ $invoice->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="sent" {{ $invoice->status === 'sent' ? 'selected' : '' }}>Sent</option>
                                <option value="paid" {{ $invoice->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="overdue" {{ $invoice->status === 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"
                                  placeholder="Additional notes or terms...">{{ $invoice->notes }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Invoice
                            </button>
                            <a href="{{ route('admin.invoices.show', $invoice) }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded">
                                <strong>Total Calculation:</strong><br>
                                <span id="calculation">
                                    ${{ number_format($invoice->subtotal, 2) }} + ${{ number_format($invoice->tax_amount, 2) }} = ${{ number_format($invoice->total_amount, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Information</h6>
            </div>
            <div class="card-body">
                <p><strong>Invoice Number:</strong><br>{{ $invoice->invoice_number }}</p>
                <p><strong>Related Quote:</strong><br>
                   <a href="{{ route('admin.quotes.show', $invoice->quote) }}" class="text-decoration-none">
                       Quote #{{ $invoice->quote_id }}
                   </a>
                </p>
                <p><strong>Customer:</strong><br>{{ $invoice->customer_name }}</p>
                <p><strong>Email:</strong><br>{{ $invoice->customer_email }}</p>
                <p><strong>Phone:</strong><br>{{ $invoice->customer_phone }}</p>
                <p><strong>Current Status:</strong><br>
                   <span class="badge bg-{{
                       $invoice->status === 'paid' ? 'success' :
                       ($invoice->status === 'overdue' ? 'danger' :
                       ($invoice->status === 'sent' ? 'info' : 'warning'))
                   }} fs-6">
                       {{ ucfirst($invoice->status) }}
                   </span>
                </p>
                @if($invoice->paid_at)
                <p><strong>Paid At:</strong><br>{{ $invoice->paid_at->format('M d, Y \a\t g:i A') }}</p>
                @endif
                <p><strong>Created:</strong><br>{{ $invoice->created_at->format('M d, Y \a\t g:i A') }}</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.invoices.show', $invoice) }}" class="btn btn-info w-100 mb-2">
                    <i class="fas fa-eye"></i> View Invoice
                </a>
                <a href="mailto:{{ $invoice->customer_email }}?subject=Invoice {{ $invoice->invoice_number }}" class="btn btn-outline-primary w-100 mb-2">
                    <i class="fas fa-envelope"></i> Send Email
                </a>
                <a href="{{ route('admin.quotes.show', $invoice->quote) }}" class="btn btn-outline-info w-100 mb-2">
                    <i class="fas fa-calculator"></i> View Quote
                </a>
                <a href="{{ route('admin.invoices.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Back to Invoices
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const subtotalInput = document.getElementById('subtotal');
    const taxRateInput = document.getElementById('tax_rate');
    const calculationSpan = document.getElementById('calculation');

    function updateCalculation() {
        const subtotal = parseFloat(subtotalInput.value) || 0;
        const taxRate = parseFloat(taxRateInput.value) || 0;
        const taxAmount = (subtotal * taxRate) / 100;
        const total = subtotal + taxAmount;

        calculationSpan.innerHTML = `$${subtotal.toFixed(2)} + $${taxAmount.toFixed(2)} = $${total.toFixed(2)}`;
    }

    subtotalInput.addEventListener('input', updateCalculation);
    taxRateInput.addEventListener('input', updateCalculation);

    // Initial calculation is already set from server values
});
</script>
@endsection
