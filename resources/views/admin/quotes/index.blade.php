@extends('admin.layout')

@section('title', 'Quotes - MoversLaredo Admin')
@section('page-title', 'Quote Requests')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">All Quote Requests</h6>
    </div>
    <div class="card-body">
        @if($quotes->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Move Date</th>
                            <th>Move Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Quote Amount</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quotes as $quote)
                        <tr>
                            <td>#{{ $quote->id }}</td>
                            <td>{{ $quote->name }}</td>
                            <td>{{ $quote->email }}</td>
                            <td>{{ $quote->move_date->format('M d, Y') }}</td>
                            <td>{{ $quote->move_type ?? '-' }}</td>
                            <td>{{ Str::limit($quote->from_address, 30) }}</td>
                            <td>{{ Str::limit($quote->to_address, 30) }}</td>
                            <td>
                                <span class="badge bg-{{ $quote->status === 'pending' ? 'warning' : ($quote->status === 'completed' ? 'success' : 'info') }}">
                                    {{ ucfirst($quote->status) }}
                                </span>
                            </td>
                            <td>
                                @if($quote->quoted_amount)
                                    ${{ number_format($quote->quoted_amount, 2) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $quote->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.quotes.show', $quote) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $quotes->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-calculator fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No quote requests yet</h5>
                <p class="text-muted">Quote requests will appear here when customers submit them.</p>
            </div>
        @endif
    </div>
</div>
@endsection
