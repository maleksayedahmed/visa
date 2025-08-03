<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'Visa Application System',
            'email' => 'info@visa.com',
            'mobile_number' => '+38671520262',
            'contact_us' => 'Contact us for any inquiries',
            'terms_and_condition' => 'Terms and conditions for visa application',
            'facebook' => 'https://facebook.com/visa',
            'x' => 'https://x.com/visa',
            'instagram' => 'https://instagram.com/visa',
            'whatsapp' => '+38671520262',
            'about_us' => 'We provide visa application services',
        ]);
    }
}
