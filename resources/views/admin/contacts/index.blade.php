@extends('admin.layout')

@section('title', 'Contact Messages - MoversLaredo Admin')
@section('page-title', 'Contact Messages')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">All Contact Messages</h6>
    </div>
    <div class="card-body">
        @if($contacts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="{{ $contact->status === 'unread' ? 'table-warning' : '' }}">
                            <td>#{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone ?: '-' }}</td>
                            <td>{{ Str::limit($contact->subject, 40) }}</td>
                            <td>
                                <span class="badge bg-{{ $contact->status === 'unread' ? 'danger' : ($contact->status === 'replied' ? 'success' : 'warning') }}">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td>{{ $contact->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $contacts->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No contact messages yet</h5>
                <p class="text-muted">Contact messages will appear here when customers send them.</p>
            </div>
        @endif
    </div>
</div>
@endsection
