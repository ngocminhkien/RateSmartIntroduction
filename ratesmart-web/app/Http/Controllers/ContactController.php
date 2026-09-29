<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactLead;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'company_name' => 'required|string|max:150',
            'interested_package' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $lead = ContactLead::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn Quý khách! Đội ngũ RateSmart & Lotus VFI sẽ liên hệ trong vòng 30 phút.',
                'lead_id' => $lead->id,
            ]);
        }

        return back()->with('success', 'Cảm ơn Quý khách! Đội ngũ RateSmart & Lotus VFI sẽ liên hệ trong vòng 30 phút.');
    }
}
