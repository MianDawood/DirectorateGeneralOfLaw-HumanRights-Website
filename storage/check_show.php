<?php
$app2 = require __DIR__.'/../bootstrap/app.php';
$app2->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$app = App\Models\NgoApplication::findOrFail(3);
$stepPayloads = DB::table('ngo_application_step_payloads')->where('application_id', 3)->get()
  ->map(fn($row) => (object) ['step_no' => $row->step_no, 'payload' => json_decode($row->payload, true) ?: []]);
$html = view('pages.dashboard.registration-applications.show', ['application' => $app, 'stepPayloads' => $stepPayloads])->render();
foreach (['bg-white','bg-slate-50','text-gray-900','text-gray-800','text-slate-400','text-slate-700','border-slate-100','border-slate-200','border-gray-100','border-gray-200','bg-gray-100','bg-gray-50','text-gray-500','text-gray-600','text-gray-700'] as $cls) {
  $unprefixed = preg_match_all('/(?<!dark:)\\'.$cls.'(?=[\s"\\\\])/', $html);
  echo $cls . ': unprefixed=' . $unprefixed . PHP_EOL;
}
