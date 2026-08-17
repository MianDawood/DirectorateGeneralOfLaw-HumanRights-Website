<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Certificate | Directorate General of Law & Human Rights</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
        }

        /* Custom utility classes */
        .bg-slate-50 { background-color: #f8fafc; }
        .min-h-screen { min-height: 100vh; }
        .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
        .max-w-3xl { max-width: 48rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .text-center { text-align: center; }
        .mb-10 { margin-bottom: 2.5rem; }
        .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
        .font-black { font-weight: 900; }
        .text-slate-900 { color: #0f172a; }
        .uppercase { text-transform: uppercase; }
        .tracking-tight { letter-spacing: -0.025em; }
        .text-slate-500 { color: #64748b; }
        .mt-2 { margin-top: 0.5rem; }
        .bg-white { background-color: #ffffff; }
        .rounded-3xl { border-radius: 1.5rem; }
        .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02); }
        .overflow-hidden { overflow: hidden; }
        .border { border-width: 1px; }
        .border-slate-200 { border-color: #e2e8f0; }
        .bg-green-600 { background-color: #16a34a; }
        .p-6 { padding: 1.5rem; }
        .w-16 { width: 4rem; }
        .h-16 { height: 4rem; }
        .bg-white { background-color: #ffffff; }
        .rounded-full { border-radius: 9999px; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .mb-3 { margin-bottom: 0.75rem; }
        .shadow-inner { box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.05); }
        .w-10 { width: 2.5rem; }
        .h-10 { height: 2.5rem; }
        .text-green-600 { color: #16a34a; }
        .text-2xl { font-size: 1.5rem; line-height: 2rem; }
        .font-bold { font-weight: 700; }
        .text-white { color: #ffffff; }
        .text-green-100 { color: #dcfce7; }
        .mt-1 { margin-top: 0.25rem; }
        .p-8 { padding: 2rem; }
        .space-y-6 > * + * { margin-top: 1.5rem; }
        .border-b { border-bottom-width: 1px; }
        .border-slate-100 { border-color: #f1f5f9; }
        .pb-4 { padding-bottom: 1rem; }
        .text-xs { font-size: 0.75rem; line-height: 1rem; }
        .font-bold { font-weight: 700; }
        .text-slate-400 { color: #94a3b8; }
        .uppercase { text-transform: uppercase; }
        .tracking-widest { letter-spacing: 0.1em; }
        .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
        .font-black { font-weight: 900; }
        .text-slate-800 { color: #1e293b; }
        .grid { display: grid; }
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
        .gap-6 { gap: 1.5rem; }
        .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
        .text-slate-700 { color: #334155; }
        .inline-flex { display: inline-flex; }
        .items-center { align-items: center; }
        .gap-1\.5 { gap: 0.375rem; }
        .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
        .py-1 { padding-top: 0.25rem; padding-bottom: 0.25rem; }
        .bg-green-50 { background-color: #f0fdf4; }
        .text-green-700 { color: #15803d; }
        .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
        .w-2 { width: 0.5rem; }
        .h-2 { height: 0.5rem; }
        .bg-green-500 { background-color: #22c55e; }
        .bg-red-600 { background-color: #dc2626; }
        .text-red-600 { color: #dc2626; }
        .text-red-100 { color: #fee2e2; }
        .text-slate-600 { color: #475569; }
        .mb-6 { margin-bottom: 1.5rem; }
        .inline-flex { display: inline-flex; }
        .gap-2 { gap: 0.5rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
        .bg-slate-900 { background-color: #0f172a; }
        .hover\:bg-black:hover { background-color: #000000; }
        .transition-colors { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .rounded-xl { border-radius: 0.75rem; }
        .w-4 { width: 1rem; }
        .h-4 { height: 1rem; }
        .no-underline { text-decoration: none; }
        a { text-decoration: none; }

        @media (min-width: 768px) {
            .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
    </style>
</head>
<body>
    @php
        // Dynamic logic - same as original
        $ngoName = '';
        if(isset($application) && $application) {
            // Try to get NGO name from step payloads if available in context
            // For standalone verification, the controller should pass $ngoName
            // Fallback: attempt to extract from application relationship
            if(!isset($ngoName) && isset($application)) {
                $step1 = DB::table('ngo_application_step_payloads')
                    ->where('application_id', $application->id)
                    ->where('step_no', 1)
                    ->first();
                if($step1) {
                    $payload = json_decode($step1->payload, true);
                    $ngoName = $payload['ngoName'] ?? 'Unknown Organization';
                } else {
                    $ngoName = 'Unknown Organization';
                }
            }
        }
        $registration_no = $registration_no ?? '';
        $issueDate = isset($application) && $application->certificate_issue_date
            ? \Carbon\Carbon::parse($application->certificate_issue_date)
            : null;
    @endphp

    <div class="bg-slate-50 min-h-screen py-16">
        <div class="max-w-3xl mx-auto px-4">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Certificate Verification</h1>
                <p class="text-slate-500 mt-2">Verify the authenticity of an NGO Registration Certificate.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200">
                @if(isset($application) && $application)
                    <!-- Valid Certificate Block -->
                    <div class="bg-green-600 p-6 text-center">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Valid Certificate</h2>
                        <p class="text-green-100 mt-1">This certificate is officially recognized by the Directorate General.</p>
                    </div>

                    <div class="p-8 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Organization Name</p>
                            <p class="text-xl font-black text-slate-800 mt-1">{{ strtoupper($ngoName) }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Registration No.</p>
                                <p class="text-lg font-bold text-slate-700 mt-1">{{ $registration_no }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Status</p>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-sm font-bold mt-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                    Approved
                                </span>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Issue Date</p>
                                <p class="text-lg font-bold text-slate-700 mt-1">
                                    {{ $issueDate ? $issueDate->format('d/m/Y') : 'N/A' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Valid Until</p>
                                <p class="text-lg font-bold text-slate-700 mt-1">
                                    {{ $issueDate ? $issueDate->copy()->addYears(3)->format('d/m/Y') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Invalid Certificate Block -->
                    <div class="bg-red-600 p-6 text-center">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner">
                            <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Invalid Certificate</h2>
                        <p class="text-red-100 mt-1">We could not find a valid registration for this certificate number.</p>
                    </div>

                    <div class="p-8 text-center">
                        <p class="text-slate-600 mb-6">The registration number <strong class="text-slate-900">{{ $registration_no }}</strong> is not recognized by our system, or the organization has been suspended.</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-black transition-colors no-underline">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Return to Homepage
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
