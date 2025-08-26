@extends('admin.layout')

@section('title', 'Quote #' . $quote->id . ' - MoversLaredo Admin')
@section('page-title', 'Quote Request #' . $quote->id)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Quote Details</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Customer Name:</strong><br>
                        {{ $quote->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Phone:</strong><br>
                        <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a>
                    </div>
                    <div class="col-md-6">
                        <strong>Preferred Move Date:</strong><br>
                        {{ $quote->move_date->format('F d, Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Move Type:</strong><br>
                        {{ $quote->move_type ?? 'Not specified' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Status:</strong><br>
                        <span class="badge bg-{{ $quote->status === 'pending' ? 'warning' : ($quote->status === 'completed' ? 'success' : 'info') }} fs-6">
                            {{ ucfirst($quote->status) }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Moving From:</strong><br>
                        {{ $quote->from_address }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Moving To:</strong><br>
                        {{ $quote->to_address }}
                    </div>
                </div>

                @if($quote->message)
                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Additional Details:</strong><br>
                        <div class="bg-light p-3 rounded">
                            {{ $quote->message }}
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <strong>Submitted:</strong><br>
                        {{ $quote->created_at->format('F d, Y \a\t g:i A') }}
                    </div>
                    <div class="col-md-6">
                        @if($quote->quoted_amount)
                            <strong>Quote Amount:</strong><br>
                            ${{ number_format($quote->quoted_amount, 2) }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Update Quote</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.quotes.update', $quote) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $quote->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="quoted" {{ $quote->status === 'quoted' ? 'selected' : '' }}>Quoted</option>
                            <option value="completed" {{ $quote->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quoted_amount" class="form-label">Quote Amount ($)</label>
                        <input type="number" step="0.01" name="quoted_amount" id="quoted_amount"
                               class="form-control" value="{{ $quote->quoted_amount }}"
                               placeholder="Enter quote amount">
                    </div>

                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Admin Notes</label>
                        <textarea name="admin_notes" id="admin_notes" rows="4"
                                  class="form-control" placeholder="Internal notes about this quote">{{ $quote->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Quote</button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                @if($quote->invoice)
                    <a href="{{ route('admin.invoices.show', $quote->invoice) }}" class="btn btn-success w-100 mb-2">
                        <i class="fas fa-file-invoice"></i> View Invoice
                    </a>
                @else
                    <a href="{{ route('admin.invoices.create', $quote) }}" class="btn btn-warning w-100 mb-2">
                        <i class="fas fa-file-invoice-dollar"></i> Create Invoice
                    </a>
                @endif
                <form action="{{ route('admin.quotes.send-email', $quote) }}" method="POST" class="mb-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary w-100"
                            onclick="return confirm('Send quote email to {{ $quote->email }}?')">
                        <i class="fas fa-envelope"></i> Send Email
                    </button>
                </form>
                <a href="tel:{{ $quote->phone }}" class="btn btn-outline-success w-100 mb-2">
                    <i class="fas fa-phone"></i> Call Customer
                </a>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Back to Quotes
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
