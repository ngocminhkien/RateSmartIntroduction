<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\Service;
use App\Models\Post;
use App\Models\PropertyData;

class HomeController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::where('is_active', true)->orderBy('order')->get();
        $clients = Client::where('is_featured', true)->orderBy('order')->get();
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $latestPosts = Post::where('status', 'published')->orderBy('published_at', 'desc')->take(3)->get();
        $stats = [
            'provinces_count' => 63,
            'hoasen_appraisals_count' => PropertyData::where('data_source', 'hoasen_appraisal')->count() + 20000,
            'market_comparables_count' => PropertyData::where('data_source', 'market_comparable')->count() + 10000,
            'bank_provinces_count' => 35,
        ];

        return view('pages.home', compact('teamMembers', 'clients', 'services', 'latestPosts', 'stats'));
    }
}
