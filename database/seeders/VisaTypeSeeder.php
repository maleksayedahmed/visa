<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisaType;

class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visaTypes = [
            [
                'name' => [
                    'en' => 'Tourist Visa',
                    'ar' => 'تأشيرة سياحية'
                ]
            ],
            [
                'name' => [
                    'en' => 'Business Visa',
                    'ar' => 'تأشيرة عمل'
                ]
            ],
            [
                'name' => [
                    'en' => 'Student Visa',
                    'ar' => 'تأشيرة طالب'
                ]
            ],
            [
                'name' => [
                    'en' => 'Work Visa',
                    'ar' => 'تأشيرة عمل'
                ]
            ],
            [
                'name' => [
                    'en' => 'Transit Visa',
                    'ar' => 'تأشيرة عبور'
                ]
            ]
        ];

        foreach ($visaTypes as $visaType) {
            VisaType::create($visaType);
        }
    }
}
