<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterSubscriptionsController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $subscriptions = NewsletterSubscription::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('email', 'like', "%{$search}%")
                        ->orWhere('full_name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('pages.dashboard.newsletter-subscriptions.index', compact('subscriptions', 'search'));
    }

    public function destroy(NewsletterSubscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.newsletter-subscriptions.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}