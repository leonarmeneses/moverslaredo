@extends('admin.layout')

@section('title', 'Contact Message #' . $contact->id . ' - MoversLaredo Admin')
@section('page-title', 'Contact Message #' . $contact->id)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Message Details</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Name:</strong><br>
                        {{ $contact->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Phone:</strong><br>
                        @if($contact->phone)
                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        @else
                            Not provided
                        @endif
                    </div>
                    <div class="col-md-6">
                        <strong>Status:</strong><br>
                        <span class="badge bg-{{ $contact->status === 'unread' ? 'danger' : ($contact->status === 'replied' ? 'success' : 'warning') }} fs-6">
                            {{ ucfirst($contact->status) }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Subject:</strong><br>
                        {{ $contact->subject }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Message:</strong><br>
                        <div class="bg-light p-3 rounded">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>

                @if($contact->admin_reply)
                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Admin Reply:</strong><br>
                        <div class="bg-primary bg-opacity-10 p-3 rounded border-start border-primary border-3">
                            {{ $contact->admin_reply }}
                        </div>
                        <small class="text-muted">Replied on: {{ $contact->replied_at->format('F d, Y \a\t g:i A') }}</small>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <strong>Received:</strong><br>
                        {{ $contact->created_at->format('F d, Y \a\t g:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Update Message</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread</option>
                            <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="admin_reply" class="form-label">Admin Reply</label>
                        <textarea name="admin_reply" id="admin_reply" rows="5"
                                  class="form-control" placeholder="Type your reply here...">{{ $contact->admin_reply }}</textarea>
                        <small class="form-text text-muted">
                            Setting status to "Replied" will automatically timestamp the reply.
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Message</button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-outline-primary w-100 mb-2">
                    <i class="fas fa-envelope"></i> Reply via Email
                </a>
                @if($contact->phone)
                <a href="tel:{{ $contact->phone }}" class="btn btn-outline-success w-100 mb-2">
                    <i class="fas fa-phone"></i> Call Customer
                </a>
                @endif
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Back to Messages
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
