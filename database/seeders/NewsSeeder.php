<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Promoting and Protecting Human Rights in KP',
                'excerpt' => 'The Directorate of Human Rights, Khyber Pakhtunkhwa, is dedicated to ensuring the fundamental rights of every citizen are respected.',
                'content' => 'The Directorate of Human Rights, Khyber Pakhtunkhwa, is dedicated to ensuring the fundamental rights of every citizen are respected. Our commitment to human rights protection spans across all sectors of society, from legal aid services to community awareness programs.

We work tirelessly to bridge the gap between policy and implementation, ensuring that human rights principles are not just theoretical concepts but practical realities in the lives of our citizens. Through comprehensive monitoring, advocacy, and direct intervention, we strive to create an environment where every individual can exercise their fundamental rights without fear or hindrance.

Our initiatives include legal assistance programs, human rights education campaigns, and collaboration with various stakeholders to promote a culture of respect for human dignity and equality.',
                'image_path' => 'images/hero image 2.png',
                'published_date' => '2026-03-05',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Awareness Session on International Women Day',
                'excerpt' => 'The Directorate General of Law & Human Rights organized an Awareness Seminar in connection with International Women Day at Shaheed Benazir Bhutto Women University Peshawar.',
                'content' => 'The Directorate General of Law & Human Rights organized a comprehensive Awareness Seminar in connection with International Women\'s Day at Shaheed Benazir Bhutto Women University Peshawar. The event brought together students, faculty members, and community leaders to discuss the importance of women\'s rights and gender equality.

The seminar featured expert speakers who addressed various aspects of women\'s empowerment, legal rights, and social inclusion. Participants engaged in interactive discussions about challenges faced by women in our society and strategies to overcome them.

Key topics covered included:
- Legal rights and protections for women
- Educational opportunities and career advancement
- Health and social welfare programs
- Community participation and leadership roles

The event concluded with a pledge to continue working towards gender equality and women\'s empowerment in Khyber Pakhtunkhwa.',
                'image_path' => 'images/hero image 1.jpg',
                'published_date' => '2026-02-09',
                'is_featured' => false,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Reconstitution of Provincial Steering Committee',
                'excerpt' => 'The Government of Khyber Pakhtunkhwa has re-constituted the Provincial Steering Committee for effective implementation of the National Action Plan on Business and Human Rights.',
                'content' => 'The Government of Khyber Pakhtunkhwa has re-constituted the Provincial Steering Committee for the effective implementation of the National Action Plan on Business and Human Rights. This important step demonstrates our commitment to ensuring that business activities in the province respect and promote human rights.

The reconstituted committee includes representatives from various government departments, private sector organizations, civil society groups, and human rights experts. The committee will oversee the implementation of the National Action Plan and ensure that businesses operating in Khyber Pakhtunkhwa adhere to international human rights standards.

Key responsibilities of the committee include:
- Monitoring business activities for human rights compliance
- Developing guidelines for corporate social responsibility
- Addressing human rights concerns in business operations
- Promoting sustainable and ethical business practices
- Coordinating with federal and international organizations

This initiative represents a significant milestone in our efforts to create a business environment that respects human rights and contributes to sustainable development in the province.',
                'image_path' => 'images/hero image 3.png',
                'published_date' => '2026-02-03',
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($news as $item) {
            News::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
