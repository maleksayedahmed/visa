<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\VisaType;
use App\Models\Visa;
use App\Models\Country;

class MultilingualVisaTest extends TestCase
{
    use RefreshDatabase;

    public function test_visa_type_can_store_multilingual_data()
    {
        $visaTypeData = [
            'name' => [
                'en' => 'Tourist Visa',
                'ar' => 'تأشيرة سياحية'
            ]
        ];

        $visaType = VisaType::create($visaTypeData);

        $this->assertEquals('Tourist Visa', $visaType->getTranslation('name', 'en'));
        $this->assertEquals('تأشيرة سياحية', $visaType->getTranslation('name', 'ar'));
    }

    public function test_visa_can_store_multilingual_data()
    {
        // Create a country first
        $country = Country::create([
            'name' => [
                'en' => 'Saudi Arabia',
                'ar' => 'المملكة العربية السعودية'
            ],
            'country_iso' => 'SA',
            'currency_iso' => 'SAR',
            'currency_name' => 'Saudi Riyal',
            'country_code' => '+966',
            'status' => 1
        ]);

        $visaData = [
            'name' => [
                'en' => 'Saudi Tourist Visa',
                'ar' => 'تأشيرة سياحية للسعودية'
            ],
            'description' => [
                'en' => 'Tourist visa for Saudi Arabia',
                'ar' => 'تأشيرة سياحية للسعودية'
            ],
            'visa_type' => [
                'en' => 'Tourist Visa',
                'ar' => 'تأشيرة سياحية'
            ],
            'country_id' => $country->id,
            'cost' => 500.00,
            'slug' => 'saudi-tourist-visa',
            'status' => 1
        ];

        $visa = Visa::create($visaData);

        $this->assertEquals('Saudi Tourist Visa', $visa->getTranslation('name', 'en'));
        $this->assertEquals('تأشيرة سياحية للسعودية', $visa->getTranslation('name', 'ar'));
        $this->assertEquals('Tourist visa for Saudi Arabia', $visa->getTranslation('description', 'en'));
        $this->assertEquals('تأشيرة سياحية للسعودية', $visa->getTranslation('description', 'ar'));
    }

    public function test_visa_type_displays_correct_language()
    {
        $visaType = VisaType::create([
            'name' => [
                'en' => 'Business Visa',
                'ar' => 'تأشيرة عمل'
            ]
        ]);

        // Test English
        app()->setLocale('en');
        $this->assertEquals('Business Visa', $visaType->name);

        // Test Arabic
        app()->setLocale('ar');
        $this->assertEquals('تأشيرة عمل', $visaType->name);
    }

    public function test_visa_displays_correct_language()
    {
        $country = Country::create([
            'name' => [
                'en' => 'UAE',
                'ar' => 'الإمارات'
            ],
            'country_iso' => 'AE',
            'currency_iso' => 'AED',
            'currency_name' => 'UAE Dirham',
            'country_code' => '+971',
            'status' => 1
        ]);

        $visa = Visa::create([
            'name' => [
                'en' => 'UAE Business Visa',
                'ar' => 'تأشيرة عمل للإمارات'
            ],
            'description' => [
                'en' => 'Business visa for UAE',
                'ar' => 'تأشيرة عمل للإمارات'
            ],
            'visa_type' => [
                'en' => 'Business Visa',
                'ar' => 'تأشيرة عمل'
            ],
            'country_id' => $country->id,
            'cost' => 800.00,
            'slug' => 'uae-business-visa',
            'status' => 1
        ]);

        // Test English
        app()->setLocale('en');
        $this->assertEquals('UAE Business Visa', $visa->name);
        $this->assertEquals('Business visa for UAE', $visa->description);
        $this->assertEquals('Business Visa', $visa->visa_type);

        // Test Arabic
        app()->setLocale('ar');
        $this->assertEquals('تأشيرة عمل للإمارات', $visa->name);
        $this->assertEquals('تأشيرة عمل للإمارات', $visa->description);
        $this->assertEquals('تأشيرة عمل', $visa->visa_type);
    }
}
