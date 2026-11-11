<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contact = ContactInfo::firstOrNew([]);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address'  => 'nullable|string',
            'phone'    => 'nullable|string|max:20',
            'email'    => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        $contact = ContactInfo::firstOrNew([]);
        $contact->fill($validated)->save();

        return redirect()->route('admin.contacts.edit')
            ->with('success', 'Contact information updated successfully!');
    }
}
