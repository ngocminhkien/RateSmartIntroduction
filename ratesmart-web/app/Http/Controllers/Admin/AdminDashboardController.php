<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyData;
use App\Models\ContactLead;
use App\Models\Post;
use App\Models\Service;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => PropertyData::count(),
            'verified_properties' => PropertyData::where('status', 'verified')->count(),
            'total_leads' => ContactLead::count(),
            'new_leads' => ContactLead::where('status', 'new')->count(),
            'total_posts' => Post::count(),
            'services_count' => Service::where('is_active', true)->count(),
        ];

        $recentLeads = ContactLead::orderBy('created_at', 'desc')->take(5)->get();
        $recentProperties = PropertyData::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentLeads', 'recentProperties'));
    }
}
