@extends('admin.layout')

@section('title', 'Create Invoice for Quote #' . $quote->id . ' - MoversLaredo Admin')
@section('page-title', 'Create Invoice for Quote #' . $quote->id)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.invoices.store', $quote) }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="date" class="form-control" id="invoice_date" name="invoice_date"
                                   value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date"
                                   value="{{ date('Y-m-d', strtotime('+30 days')) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="service_description" class="form-label">Service Description</label>
                        <textarea class="form-control" id="service_description" name="service_description" rows="4"
                                  placeholder="Describe the moving services provided..." required>Moving services from {{ $quote->from_address }} to {{ $quote->to_address }} on {{ $quote->move_date->format('M d, Y') }}{{ $quote->move_type ? ' - ' . $quote->move_type : '' }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subtotal" class="form-label">Subtotal ($)</label>
                            <input type="number" step="0.01" class="form-control" id="subtotal" name="subtotal"
                                   value="{{ $quote->quoted_amount ?? '' }}" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tax_rate" class="form-label">Tax Rate (%)</label>
                            <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate"
                                   value="8.25" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"
                                  placeholder="Additional notes or terms..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-file-invoice"></i> Create Invoice
                            </button>
                            <a href="{{ route('admin.quotes.show', $quote) }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded">
                                <strong>Total Calculation:</strong><br>
                                <span id="calculation">Subtotal + Tax = Total</span>
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
                <h6 class="m-0 font-weight-bold text-primary">Quote Information</h6>
            </div>
            <div class="card-body">
                <p><strong>Customer:</strong><br>{{ $quote->name }}</p>
                <p><strong>Email:</strong><br>{{ $quote->email }}</p>
                <p><strong>Phone:</strong><br>{{ $quote->phone }}</p>
                <p><strong>Move Date:</strong><br>{{ $quote->move_date->format('F d, Y') }}</p>
                <p><strong>Move Type:</strong><br>{{ $quote->move_type ?? 'Not specified' }}</p>
                <p><strong>From:</strong><br>{{ $quote->from_address }}</p>
                <p><strong>To:</strong><br>{{ $quote->to_address }}</p>
                @if($quote->quoted_amount)
                <p><strong>Quoted Amount:</strong><br>${{ number_format($quote->quoted_amount, 2) }}</p>
                @endif
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

    // Initial calculation
    updateCalculation();
});
</script>
@endsection
