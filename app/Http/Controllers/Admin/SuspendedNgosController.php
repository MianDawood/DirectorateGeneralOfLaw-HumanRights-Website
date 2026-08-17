<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NgosExport;
use App\Http\Controllers\Controller;
use App\Models\NgoApplication;
use App\Support\NgoFilters;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SuspendedNgosController extends Controller
{
    use NgoFilters;

    public function index(Request $request)
    {
        $query = $this->baseQuery($request);

        $ngos = $query->paginate(15)->withQueryString();

        return view('pages.dashboard.ngos.suspended', [
            'ngos' => $ngos,
            'type' => 'suspended',
            'districts' => $this->ngoDistricts(),
            'thematicAreas' => $this->ngoThematicAreas(),
        ]);
    }

    public function export(Request $request)
    {
        $ngos = $this->baseQuery($request)->get();

        $prefix = 'suspended_ngos_' . now()->format('Y-m-d');

        if ($request->input('format') === 'pdf') {
            $pdf = Pdf::loadView('pdf.ngos_report', [
                'ngos' => $ngos,
                'type' => 'suspended',
                'generatedAt' => now(),
                'filters' => $request->only(['district', 'thematic_area', 'date_from', 'date_to']),
            ]);

            return $pdf->download($prefix . '.pdf');
        }

        return Excel::download(new NgosExport($ngos, 'suspended'), $prefix . '.xlsx');
    }

    private function baseQuery(Request $request)
    {
        $query = NgoApplication::query()
            ->with('profile')
            ->where('status', 'suspended');

        $this->applyFilters($query, $request);

        return $query;
    }

    private function applyFilters($query, Request $request): void
    {
        if ($district = trim((string) $request->input('district'))) {
            $query->whereHas('profile', fn ($p) => $p->where('district', $district));
        }

        if ($thematicLabel = $request->input('thematic_area')) {
            $query->whereHas('profile', fn ($p) => $p->where('thematic_areas', 'like', "%{$thematicLabel}%"));
        }

        if ($from = $request->input('date_from')) {
            $query->whereDate('suspended_at', '>=', $from);
        }
        if ($to = $request->input('date_to')) {
            $query->whereDate('suspended_at', '<=', $to);
        }
    }
}