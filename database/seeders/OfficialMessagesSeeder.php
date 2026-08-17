<?php

namespace Database\Seeders;

use App\Models\OfficialMessage;
use Illuminate\Database\Seeder;

class OfficialMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Mr. Aftab Alam',
                'position' => 'Minister for Law, Parliamentary Affairs & Human Rights',
                'image_path' => 'images/Minister.jpeg',
                'statement' => "The paramount duty of our government is to uphold the rule of law and ensure the fundamental rights of every citizen of Khyber Pakhtunkhwa are protected and respected.\n\nWe are dedicated to establishing a framework of justice and equality that permeates every layer of society. With comprehensive legal reforms, we are focusing on accelerating access to justice and defending the marginalized.\n\nUnder my leadership, the Ministry of Law and Human Rights will leave no stone unturned in ensuring that prompt mechanisms are in place to address human rights violations and provide necessary legal aid to the destitute.",
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Syed Atta-Ur-Rehman',
                'position' => 'Secretary, Law Parliamentary Affairs & Human Rights Department',
                'image_path' => 'images/logo.jpg',
                'statement' => "The strength of our legal system lies in its unwavering commitment to human dignity and equality. Our mandate is clear: to formulate policies that reflect the true spirit of justice.\n\nThrough robust policy frameworks, effective regulation, and deep institutional coordination, we aim to translate legal rights into tangible realities for the people. We focus closely on capacity building within our departments.\n\nI urge all citizens to utilize our services proactively and support us actively in ensuring the protection of human rights in the province.",
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mr. Taimur Iqbal',
                'position' => 'Director General, Law & Human Rights KP',
                'image_path' => 'images/logo.jpg',
                'statement' => "Our Directorate serves as the vanguard for the protection of human rights at the grassroots level. It is our responsibility to bridge the gap between people and justice.\n\nWe take pride in our rapid response mechanism through our active Complaint Cell, our continuous campaigns against social injustices, and our ongoing seminars to educate people about their rights.\n\nWe are creating an ecosystem where fear is replaced by law, and deprivation is replaced by rights. Rest assured, your grievance is our utmost priority.",
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($messages as $message) {
            OfficialMessage::updateOrCreate(
                ['name' => $message['name']],
                $message
            );
        }
    }
}
