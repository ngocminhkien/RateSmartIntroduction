<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactLead;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactLead::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.leads.index', compact('leads'));
    }

    public function updateStatus(Request $request, ContactLead $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacting,meeting_scheduled,converted,closed',
            'notes' => 'nullable|string',
        ]);

        $lead->update($validated);

        return back()->with('success', 'Đã cập nhật trạng thái yêu cầu liên hệ!');
    }
}
