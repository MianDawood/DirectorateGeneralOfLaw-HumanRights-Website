<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NgoNotice;

class NgoNoticeController extends Controller
{
    public function index()
    {
        $notices = NgoNotice::where('is_public_notice', false)->latest()->get();
        $publicNotice = NgoNotice::where('is_public_notice', true)->latest()->first();
        
        return view('pages.ngo_notices', compact('notices', 'publicNotice'));
    }
}
