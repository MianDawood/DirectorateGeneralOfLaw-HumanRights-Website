<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoDirective;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class NgoDirectivesController extends Controller
{
    /**
     * Display the edit form for the NGO Directives page.
     */
    public function edit(): View
    {
        $directive = NgoDirective::first() ?? new NgoDirective();
        return view('pages.dashboard.ngo-directives.edit', compact('directive'));
    }

    /**
     * Update the NGO Directives page content.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'heading'      => 'nullable|string',
            'desc_2'       => 'nullable|string',
            'card_1_title' => 'nullable|string',
            'card_1_desc'  => 'nullable|string',
            'card_2_title' => 'nullable|string',
            'card_2_desc'  => 'nullable|string',
        ]);

        $directive = NgoDirective::first();
        if (!$directive) {
            $directive = new NgoDirective();
        }

        $directive->heading      = $request->input('heading');
        $directive->desc_2       = $request->input('desc_2');
        $directive->card_1_title = $request->input('card_1_title');
        $directive->card_1_desc  = $request->input('card_1_desc');
        $directive->card_2_title = $request->input('card_2_title');
        $directive->card_2_desc  = $request->input('card_2_desc');
        
        // is_active is no longer managed via the dashboard UI
        // We ensure it stays active if it was active
        if ($directive->id === null) {
            $directive->is_active = true;
        }

        $directive->save();

        return redirect()
            ->route('admin.ngo-directives.edit')
            ->with('success', 'NGO Directives updated successfully.');
    }
}