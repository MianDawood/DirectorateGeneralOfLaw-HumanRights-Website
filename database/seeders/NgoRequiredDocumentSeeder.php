<?php

namespace Database\Seeders;

use App\Models\NgoRequiredDocument;
use Illuminate\Database\Seeder;

class NgoRequiredDocumentSeeder extends Seeder
{
    public function run(): void
    {
        $docs = [
            ['name' => 'NGO Registration Form', 'file_path' => 'images/PDF/NGOs Registration Form, Directorate General of Law & Human Rights Government of Khyer Pakhtunkhwa.pdf', 'order' => 0],
            ['name' => 'KP NGO Rules 2024', 'file_path' => 'images/PDF/Khyber Pakhtunkhwa Non-Governmental Organizations (Registration Working in the Field of Human Rights) Rules, 2024.pdf', 'order' => 1],
            ['name' => 'Treasury Challan Form', 'file_path' => 'images/PDF/Treasury_Challan_Form NGOs Registration (DG Law and Human Rights Govt of KP).pdf.pdf', 'order' => 2],
        ];

        foreach ($docs as $doc) {
            NgoRequiredDocument::create($doc);
        }
    }
}
