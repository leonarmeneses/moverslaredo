<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactMessage::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactMessage $contact)
    {
        // Mark as read when viewing
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, ContactMessage $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:unread,read,replied',
            'admin_reply' => 'nullable|string'
        ]);

        if ($validated['status'] === 'replied' && $validated['admin_reply']) {
            $validated['replied_at'] = now();
        }

        $contact->update($validated);

        return back()->with('success', 'Contact updated successfully!');
    }
}
