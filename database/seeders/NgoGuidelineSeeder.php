<?php

namespace Database\Seeders;

use App\Models\NgoGuideline;
use Illuminate\Database\Seeder;

class NgoGuidelineSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'title' => 'Obtain Registration Form',
                'description' => "Download the official registration form from the Directorate's website or collect a physical copy from the office located at Plot No. 21, Sector B-2, Phase-V, Hayatabad, Peshawar.",
                'order' => 0
            ],
            [
                'title' => 'Complete the Application',
                'description' => "Fill in all required fields with accurate information. Attach all required supporting documents as listed in the Required Documents section.",
                'order' => 1
            ],
            [
                'title' => 'Pay Registration Fee',
                'description' => "Deposit the prescribed registration fee through Treasury Challan. Keep evidence of payment for submission with your application.",
                'order' => 2
            ],
            [
                'title' => 'Submit Application',
                'description' => "Submit the completed application along with all supporting documents to the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.",
                'order' => 3
            ],
            [
                'title' => 'Verification & Approval',
                'description' => "Your application will be reviewed and verified. Upon successful verification, a registration certificate will be issued to your organization.",
                'order' => 4
            ],
        ];

        foreach ($steps as $step) {
            NgoGuideline::create($step);
        }
    }
}
