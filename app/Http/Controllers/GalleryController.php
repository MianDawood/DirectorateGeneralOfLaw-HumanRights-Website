<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class GalleryController extends Controller
{
    public function photos(): RedirectResponse
    {
        return redirect()->to(route('mediacorner') . '#events');
    }

    public function videos(): RedirectResponse
    {
        return redirect()->to(route('mediacorner') . '#events');
    }
}
