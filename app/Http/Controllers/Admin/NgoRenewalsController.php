<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NgoApplication;
use App\Support\NgoFilters;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NgoRenewalsController extends Controller
{
    use NgoFilters;

    public function index(Request $request)
    {
        $query = NgoApplication::query()
            ->where('status', 'approved')
            ->with('profile');

        $scope = $request->input('scope', 'due');

        if ($scope === 'due') {
            $query->where(function ($q) {
                $q->whereNull('expiry_date')
                    ->orWhereDate('expiry_date', '<=', now()->addDays(90)->toDateString());
            });
        }

        if ($district = trim((string) $request->input('district'))) {
            $query->whereHas('profile', fn ($p) => $p->where('district', $district));
        }

        if ($thematicLabel = $request->input('thematic_area')) {
            $query->whereHas('profile', fn ($p) => $p->where('thematic_areas', 'like', "%{$thematicLabel}%"));
        }

        $ngos = $query->orderByRaw('COALESCE(expiry_date, "9999-12-31") ASC')
            ->paginate(15)
            ->withQueryString();

        return view('pages.dashboard.ngos.renewals', [
            'ngos' => $ngos,
            'scope' => $scope,
            'districts' => $this->ngoDistricts(),
            'thematicAreas' => $this->ngoThematicAreas(),
        ]);
    }

    public function renew(Request $request, NgoApplication $ngo)
    {
        $request->validate([
            'renew_years' => 'nullable|integer|min:1|max:10',
        ]);

        $years = (int) $request->input('renew_years', 3);
        $from = $ngo->expiry_date
            ? Carbon::parse($ngo->expiry_date)->addDays(1)->endOfDay()
            : now();

        $newExpiry = (clone $from)->addYears($years);

        $ngo->update([
            'expiry_date' => $newExpiry->toDateString(),
            'last_renewal_date' => now()->toDateString(),
        ]);

        return redirect()
            ->route('admin.ngos.renewals.index', $request->only('scope', 'district', 'thematic_area'))
            ->with('success', "Registration renewed until {$newExpiry->format('M d, Y')}.");
    }
}