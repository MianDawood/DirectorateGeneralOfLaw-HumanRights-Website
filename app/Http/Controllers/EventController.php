<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function show(Event $event): View
    {
        abort_unless($event->is_active, 404);

        $event->load(['images', 'videos']);

        return view('pages.event-show', compact('event'));
    }
}
