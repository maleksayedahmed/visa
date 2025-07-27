<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visa;
use App\Models\Country;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a country for the visa
        $country = Country::first();
        
        if (!$country) {
            return; // No countries available
        }

        $visas = [
            [
                'name' => [
                    'en' => 'Saudi Arabia Tourist Visa',
                    'ar' => 'تأشيرة سياحية للسعودية'
                ],
                'description' => [
                    'en' => 'Tourist visa for visiting Saudi Arabia for tourism purposes',
                    'ar' => 'تأشيرة سياحية لزيارة المملكة العربية السعودية لأغراض السياحة'
                ],
                'visa_type' => [
                    'en' => 'Tourist Visa',
                    'ar' => 'تأشيرة سياحية'
                ],
                'country_id' => $country->id,
                'cost' => 500.00,
                'slug' => 'saudi-arabia-tourist-visa',
                'status' => 1
            ],
            [
                'name' => [
                    'en' => 'UAE Business Visa',
                    'ar' => 'تأشيرة عمل للإمارات'
                ],
                'description' => [
                    'en' => 'Business visa for conducting business activities in UAE',
                    'ar' => 'تأشيرة عمل لممارسة الأنشطة التجارية في الإمارات'
                ],
                'visa_type' => [
                    'en' => 'Business Visa',
                    'ar' => 'تأشيرة عمل'
                ],
                'country_id' => $country->id,
                'cost' => 800.00,
                'slug' => 'uae-business-visa',
                'status' => 1
            ],
            [
                'name' => [
                    'en' => 'Qatar Student Visa',
                    'ar' => 'تأشيرة طالب لقطر'
                ],
                'description' => [
                    'en' => 'Student visa for studying in Qatar universities',
                    'ar' => 'تأشيرة طالب للدراسة في جامعات قطر'
                ],
                'visa_type' => [
                    'en' => 'Student Visa',
                    'ar' => 'تأشيرة طالب'
                ],
                'country_id' => $country->id,
                'cost' => 300.00,
                'slug' => 'qatar-student-visa',
                'status' => 1
            ]
        ];

        foreach ($visas as $visa) {
            Visa::create($visa);
        }
    }
}
