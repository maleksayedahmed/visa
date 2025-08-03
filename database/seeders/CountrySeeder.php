<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => [
                    'en' => 'Iraq',
                    'ar' => 'العراق'
                ],
                'country_iso' => 'IRQ',
                'currency_iso' => 'IQD',
                'currency_name' => 'Iraqi Dinar',
                'country_code' => '+964',
                'status' => 1
            ],
            [
                'name' => [
                    'en' => 'Oman',
                    'ar' => 'عمان'
                ],
                'country_iso' => 'OMN',
                'currency_iso' => 'OMR',
                'currency_name' => 'Omani Rial',
                'country_code' => '+968',
                'status' => 1
            ],
            [
                'name' => [
                    'en' => 'Qatar',
                    'ar' => 'قطر'
                ],
                'country_iso' => 'QAT',
                'currency_iso' => 'QAR',
                'currency_name' => 'Qatari Riyal',
                'country_code' => '+974',
                'status' => 1
            ],
            [
                'name' => [
                    'en' => 'United Arab Emirates',
                    'ar' => 'الإمارات العربية المتحدة'
                ],
                'country_iso' => 'ARE',
                'currency_iso' => 'AED',
                'currency_name' => 'UAE Dirham',
                'country_code' => '+971',
                'status' => 1
            ]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
} 