@extends('admin.layout')

@section('title', 'Invoices - MoversLaredo Admin')
@section('page-title', 'Invoices Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">All Invoices</h6>
        <span class="badge bg-primary fs-6">{{ $invoices->total() }} Total</span>
    </div>
    <div class="card-body">
        @if($invoices->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Invoice Date</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        <tr>
                            <td>
                                <strong>{{ $invoice->invoice_number }}</strong><br>
                                <small class="text-muted">Quote #{{ $invoice->quote_id }}</small>
                            </td>
                            <td>
                                <strong>{{ $invoice->customer_name }}</strong><br>
                                <small class="text-muted">{{ $invoice->customer_email }}</small>
                            </td>
                            <td>
                                <strong>${{ number_format($invoice->total_amount, 2) }}</strong><br>
                                @if($invoice->tax_amount > 0)
                                <small class="text-muted">+${{ number_format($invoice->tax_amount, 2) }} tax</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{
                                    $invoice->status === 'paid' ? 'success' :
                                    ($invoice->status === 'overdue' ? 'danger' :
                                    ($invoice->status === 'sent' ? 'info' : 'warning'))
                                }} fs-6">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td>{{ $invoice->invoice_date->format('M d, Y') }}</td>
                            <td>
                                {{ $invoice->due_date->format('M d, Y') }}
                                @if($invoice->due_date->isPast() && $invoice->status !== 'paid')
                                    <br><small class="text-danger">Overdue</small>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.invoices.show', $invoice) }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.invoices.edit', $invoice) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.quotes.show', $invoice->quote) }}"
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-calculator"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $invoices->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No invoices found</h5>
                <p class="text-muted">Start by creating an invoice from a quote.</p>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-primary">
                    <i class="fas fa-calculator"></i> View Quotes
                </a>
            </div>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <h4>${{ number_format($invoices->where('status', 'paid')->sum('total_amount'), 2) }}</h4>
                <p class="mb-0">Total Paid</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <h4>${{ number_format($invoices->whereIn('status', ['draft', 'sent'])->sum('total_amount'), 2) }}</h4>
                <p class="mb-0">Pending</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <h4>{{ $invoices->where('status', 'overdue')->count() }}</h4>
                <p class="mb-0">Overdue</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <h4>${{ number_format($invoices->sum('total_amount'), 2) }}</h4>
                <p class="mb-0">Total Revenue</p>
            </div>
        </div>
    </div>
</div>
@endsection
