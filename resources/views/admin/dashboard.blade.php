@extends('admin.layout')

@section('title', 'Admin Dashboard - MoversLaredo')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistics Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Invoice Pending</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['pending_invoices'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-invoice-dollar fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Quotes</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['pending_quotes'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Messages</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['total_contacts'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Unread Messages</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['unread_contacts'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Quotes -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Quotes</h6>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-primary btn-sm">View All</a>
            </div>
            <div class="card-body">
                @if($recent_quotes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Move Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_quotes as $quote)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.quotes.show', $quote) }}" class="text-decoration-none">
                                            {{ $quote->name }}
                                        </a>
                                    </td>
                                    <td>{{ $quote->move_date->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $quote->status === 'pending' ? 'warning' : ($quote->status === 'completed' ? 'success' : 'info') }}">
                                            {{ ucfirst($quote->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">No quotes yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Contact Messages -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Messages</h6>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary btn-sm">View All</a>
            </div>
            <div class="card-body">
                @if($recent_contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_contacts as $contact)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="text-decoration-none">
                                            {{ $contact->name }}
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $contact->status === 'unread' ? 'danger' : ($contact->status === 'replied' ? 'success' : 'warning') }}">
                                            {{ ucfirst($contact->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">No messages yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Invoices -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Invoices</h6>
                <a href="{{ route('admin.invoices.index') }}" class="btn btn-primary btn-sm">View All</a>
            </div>
            <div class="card-body">
                @if($recent_invoices->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_invoices as $invoice)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-decoration-none">
                                            {{ $invoice->invoice_number }}
                                        </a>
                                    </td>
                                    <td>{{ $invoice->customer_name }}</td>
                                    <td>
                                        <span class="badge bg-{{
                                            $invoice->status === 'paid' ? 'success' :
                                            ($invoice->status === 'overdue' ? 'danger' :
                                            ($invoice->status === 'sent' ? 'info' : 'warning'))
                                        }}">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">No invoices yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
