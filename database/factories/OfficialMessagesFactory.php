<?php

namespace Database\Factories;

use App\Models\OfficialMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfficialMessage>
 */
class OfficialMessagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = OfficialMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $officials = [
            [
                'name' => 'Mr. Aftab Alam',
                'position' => 'Minister for Law, Parliamentary Affairs & Human Rights',
                'image_path' => 'images/Minister.jpeg',
                'statement' => "The paramount duty of our government is to uphold the rule of law and ensure the fundamental rights of every citizen of Khyber Pakhtunkhwa are protected and respected.\n\nWe are dedicated to establishing a framework of justice and equality that permeates every layer of society. With comprehensive legal reforms, we are focusing on accelerating access to justice and defending the marginalized.\n\nUnder my leadership, the Ministry of Law and Human Rights will leave no stone unturned in ensuring that prompt mechanisms are in place to address human rights violations and provide necessary legal aid to the destitute.",
            ],
            [
                'name' => 'Dr. Syed Atta-Ur-Rehman',
                'position' => 'Secretary, Law Parliamentary Affairs & Human Rights Department',
                'image_path' => 'images/logo.jpg',
                'statement' => "The strength of our legal system lies in its unwavering commitment to human dignity and equality. Our mandate is clear: to formulate policies that reflect the true spirit of justice.\n\nThrough robust policy frameworks, effective regulation, and deep institutional coordination, we aim to translate legal rights into tangible realities for the people. We focus closely on capacity building within our departments.\n\nI urge all citizens to utilize our services proactively and support us actively in ensuring the protection of human rights in the province.",
            ],
            [
                'name' => 'Mr. Taimur Iqbal',
                'position' => 'Director General, Law & Human Rights KP',
                'image_path' => 'images/logo.jpg',
                'statement' => "Our Directorate serves as the vanguard for the protection of human rights at the grassroots level. It is our responsibility to bridge the gap between people and justice.\n\nWe take pride in our rapid response mechanism through our active Complaint Cell, our continuous campaigns against social injustices, and our ongoing seminars to educate people about their rights.\n\nWe are creating an ecosystem where fear is replaced by law, and deprivation is replaced by rights. Rest assured, your grievance is our utmost priority.",
            ],
        ];

        $official = fake()->randomElement($officials);

        return [
            'name' => $official['name'],
            'position' => $official['position'],
            'image_path' => $official['image_path'],
            'statement' => $official['statement'],
            'order' => fake()->numberBetween(1, 10),
            'is_active' => fake()->boolean(90), // 90% chance of being active
        ];
    }

    /**
     * Indicate that the official message is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Create a minister official message.
     */
    public function minister(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Mr. Aftab Alam',
            'position' => 'Minister for Law, Parliamentary Affairs & Human Rights',
            'image_path' => 'images/Minister.jpeg',
            'short_statement' => 'The paramount duty of our government is to uphold the rule of law and ensure the fundamental rights of every citizen of Khyber Pakhtunkhwa are protected and respected.',
            'full_statement' => "The paramount duty of our government is to uphold the rule of law and ensure the fundamental rights of every citizen of Khyber Pakhtunkhwa are protected and respected.\n\nWe are dedicated to establishing a framework of justice and equality that permeates every layer of society. With comprehensive legal reforms, we are focusing on accelerating access to justice and defending the marginalized.\n\nUnder my leadership, the Ministry of Law and Human Rights will leave no stone unturned in ensuring that prompt mechanisms are in place to address human rights violations and provide necessary legal aid to the destitute.",
            'order' => 1,
        ]);
    }

    /**
     * Create a secretary official message.
     */
    public function secretary(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Dr. Syed Atta-Ur-Rehman',
            'position' => 'Secretary, Law Parliamentary Affairs & Human Rights Department',
            'image_path' => 'images/logo.jpg',
            'short_statement' => 'Our commitment to legislative reform and institutional development is unwavering. We strive to build a just, transparent, and accountable governance framework.',
            'full_statement' => "The strength of our legal system lies in its unwavering commitment to human dignity and equality. Our mandate is clear: to formulate policies that reflect the true spirit of justice.\n\nThrough robust policy frameworks, effective regulation, and deep institutional coordination, we aim to translate legal rights into tangible realities for the people. We focus closely on capacity building within our departments.\n\nI urge all citizens to utilize our services proactively and support us actively in ensuring the protection of human rights in the province.",
            'order' => 2,
        ]);
    }

    /**
     * Create a director general official message.
     */
    public function directorGeneral(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Mr. Taimur Iqbal',
            'position' => 'Director General, Law & Human Rights KP',
            'image_path' => 'images/logo.jpg',
            'short_statement' => 'The Directorate General is dedicated to ensuring the protection and promotion of human rights across Khyber Pakhtunkhwa through awareness, monitoring, and enforcement.',
            'full_statement' => "Our Directorate serves as the vanguard for the protection of human rights at the grassroots level. It is our responsibility to bridge the gap between people and justice.\n\nWe take pride in our rapid response mechanism through our active Complaint Cell, our continuous campaigns against social injustices, and our ongoing seminars to educate people about their rights.\n\nWe are creating an ecosystem where fear is replaced by law, and deprivation is replaced by rights. Rest assured, your grievance is our utmost priority.",
            'order' => 3,
        ]);
    }
}
