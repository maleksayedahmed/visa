<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visa;
use App\Models\Country;
use App\Models\VisaType;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get countries
        $iraq = Country::where('country_iso', 'IRQ')->first();
        $oman = Country::where('country_iso', 'OMN')->first();
        $qatar = Country::where('country_iso', 'QAT')->first();
        $uae = Country::where('country_iso', 'ARE')->first();

        // Get visa types
        $touristVisa = VisaType::where('name->en', 'Tourist Visa')->first();
        $workVisa = VisaType::where('name->en', 'Work Visa')->first();
        $businessVisa = VisaType::where('name->en', 'Business Visa')->first();

        if (!$iraq || !$oman || !$qatar || !$uae) {
            return; // Countries not available
        }

        $visas = [
            // Iraq Visa
            [
                'name' => [
                    'en' => 'Baghdad Visa 🇮🇶',
                    'ar' => 'تأشيرة بغداد 🇮🇶'
                ],
                'description' => [
                    'en' => '<div class="visa-details">
                        <div class="visa-options">
                            <div class="option">
                                <h4>🔹 Annual Multiple Entry</h4>
                                <p>⭕ Price: $2400</p>
                            </div>
                            <div class="option">
                                <h4>🔹 Monthly</h4>
                                <p>⭕ Price: $1350</p>
                            </div>
                        </div>
                        <div class="requirements">
                            <h4>⭕ Required Documents:</h4>
                            <ul>
                                <li>Passport valid for at least 8 months</li>
                                <li>Personal photo</li>
                            </ul>
                        </div>
                        <p><strong>Processing time:</strong> 20 to 40 days</p>
                        <div class="note">
                            <p>🚫 Note: No previous bans or violations in Baghdad</p>
                        </div>
                    </div>',
                    'ar' => '<div class="visa-details">
                        <div class="visa-options">
                            <div class="option">
                                <h4>🔹سنوية متعددة</h4>
                                <p>⭕ السعر $2400</p>
                            </div>
                            <div class="option">
                                <h4>🔹 شهرية</h4>
                                <p>⭕بسعر $1350</p>
                            </div>
                        </div>
                        <div class="requirements">
                            <h4>⭕الأوراق المطلوبة :</h4>
                            <ul>
                                <li>-جواز سفر صلاحيته لا تقل عن 8 شهور</li>
                                <li>-صورة شخصية</li>
                            </ul>
                        </div>
                        <p><strong>مدة الانجاز:</strong> من ٢٠ الى ٤٠ يوم</p>
                        <div class="note">
                            <p>🚫ملاحظة: عدم وجود منع أو مخالفات سابقة في بغداد</p>
                        </div>
                    </div>'
                ],
                'visa_type_id' => $touristVisa->id,
                'country_id' => $iraq->id,
                'cost' => 2400.00,
                'slug' => 'baghdad-visa',
                'status' => 1
            ],
            // Oman Visa
            [
                'name' => [
                    'en' => 'Oman 🇴🇲',
                    'ar' => 'سلطنة عمان 🇴🇲'
                ],
                'description' => [
                    'en' => '<div class="visa-details">
                        <h4>Free Work Residence</h4>
                        <div class="visa-options">
                            <div class="option">
                                <h4>♦ Two Years</h4>
                                <h4>♦ Comprehensive all procedures</h4>
                                <p>Until receiving the ID inside the country</p>
                            </div>
                        </div>
                        <p><strong>Processing time:</strong> 30 to 40 days</p>
                        <p><strong>Price:</strong> $2750</p>
                        <div class="requirements">
                            <h4>Required Documents:</h4>
                            <ul>
                                <li>Passport copy</li>
                                <li>Personal photo</li>
                            </ul>
                        </div>
                        <div class="note">
                            <p><strong>Note:</strong></p>
                            <p>Cannot apply for ages under 21 years</p>
                            <p>Medical examination is paid by the customer inside Oman, value 110</p>
                        </div>
                    </div>',
                    'ar' => '<div class="visa-details">
                        <h4>اقامة عمل حرة</h4>
                        <div class="visa-options">
                            <div class="option">
                                <h4>♦سنتين</h4>
                                <h4>♦شاملة كافة الآجراءات</h4>
                                <p>حتى استلام الهوية داخل البلد</p>
                            </div>
                        </div>
                        <p><strong>مدة الانجاز:</strong> من 30 إلى 40 يوم</p>
                        <p><strong>السعر:</strong> $ 2750</p>
                        <div class="requirements">
                            <h4>الاوراق المطلوبة :</h4>
                            <ul>
                                <li>·نسخة عن جواز السفر</li>
                                <li>·صورة شخصية</li>
                            </ul>
                        </div>
                        <div class="note">
                            <p><strong>ملاحظة:</strong></p>
                            <p>لايمكن التقديم للأعمار تحت 21 سنة</p>
                            <p>الفحص الطبي يدفعه الزبون داخل السلطنة قيمته 110</p>
                        </div>
                    </div>'
                ],
                'visa_type_id' => $workVisa->id,
                'country_id' => $oman->id,
                'cost' => 2750.00,
                'slug' => 'oman-work-residence',
                'status' => 1
            ],
            // Qatar Visa
            [
                'name' => [
                    'en' => 'Qatar 🇶🇦',
                    'ar' => 'قطر 🇶🇦'
                ],
                'description' => [
                    'en' => '<div class="visa-details">
                        <h4>📑 Tourist Visa:</h4>
                        <p><strong>📌 Residence period:</strong> 30 days</p>
                        <div class="visa-options">
                            <div class="option">
                                <h4>📑 Includes actual hotel booking for 3 nights</h4>
                                <h4>📑 Monthly tourist visa</h4>
                            </div>
                        </div>
                        <div class="requirements">
                            <h4>📫 Required Documents:</h4>
                            <ul>
                                <li>📌 Passport copy PDF (high resolution original colors)</li>
                                <li>📌 High resolution personal photo</li>
                            </ul>
                        </div>
                        <p><strong>📫 Processing time:</strong> 40 working days</p>
                        <div class="note">
                            <p><strong>📛🚫 Note:</strong></p>
                            <p>🚨 Available for individuals + families</p>
                        </div>
                        <p><strong>🛒 Price:</strong> $425</p>
                    </div>',
                    'ar' => '<div class="visa-details">
                        <h4>📑تأشيرة سياحية :</h4>
                        <p><strong>📌مدة الاقامة:</strong> 30 يوم</p>
                        <div class="visa-options">
                            <div class="option">
                                <h4>📑شاملة حجز فندقي فعلي 3 ليالي</h4>
                                <h4>📑 تأشيرة سياحية شهر</h4>
                            </div>
                        </div>
                        <div class="requirements">
                            <h4>📫الأوراق المطلوبة :</h4>
                            <ul>
                                <li>📌نسخة عن جواز السفر PDF ((دقة عالية ألوان أصلية))</li>
                                <li>📌صورة شخصية دقة عالية</li>
                            </ul>
                        </div>
                        <p><strong>📫مدة الانجاز :</strong> ((40)) يوم عمل</p>
                        <div class="note">
                            <p><strong>📛🚫ملاحظة :</strong></p>
                            <p>🚨متاح التقديم ((أفراد + عوائل))</p>
                        </div>
                        <p><strong>🛒السعر:</strong> $ 425</p>
                    </div>'
                ],
                'visa_type_id' => $touristVisa->id,
                'country_id' => $qatar->id,
                'cost' => 425.00,
                'slug' => 'qatar-tourist-visa',
                'status' => 1
            ],
            // UAE Visa
            [
                'name' => [
                    'en' => 'UAE 🇦🇪',
                    'ar' => 'الامارات 🇦🇪'
                ],
                'description' => [
                    'en' => '<div class="visa-details">
                        <div class="visa-options">
                            <div class="option">
                                <h4>🔴 Two-year residence outside the country</h4>
                                <p><strong>Price:</strong> $6500</p>
                            </div>
                        </div>
                        <p><strong>🔴 Processing time:</strong> 10 to 15 days</p>
                        <div class="requirements">
                            <h4>🔴 Required Documents:</h4>
                            <ul>
                                <li>Passport valid for at least 8 months</li>
                                <li>Personal photo</li>
                            </ul>
                        </div>
                        <div class="payment">
                            <p><strong>🔴 Payment mechanism:</strong> Half the amount upon application and the second half upon receipt</p>
                        </div>
                    </div>',
                    'ar' => '<div class="visa-details">
                        <div class="visa-options">
                            <div class="option">
                                <h4>🔴إقامة سنتين خارج الدولة</h4>
                                <p><strong>السعر:</strong> 6500$</p>
                            </div>
                        </div>
                        <p><strong>🔴مدة الانجاز:</strong> من 10الى 15 يوم</p>
                        <div class="requirements">
                            <h4>🔴 الأوراق المطلوبة:</h4>
                            <ul>
                                <li>-جواز سفر صلاحيته لا تقل عن 8 شهور</li>
                                <li>-صورة شخصية</li>
                            </ul>
                        </div>
                        <div class="payment">
                            <p><strong>🔴آلية الدفع:</strong> نصف المبلغ عند التقديم والنصف الثاني عند الاستلام</p>
                        </div>
                    </div>'
                ],
                'visa_type_id' => $businessVisa->id,
                'country_id' => $uae->id,
                'cost' => 6500.00,
                'slug' => 'uae-residence-visa',
                'status' => 1
            ]
        ];

        foreach ($visas as $visa) {
            Visa::create($visa);
        }
    }
}
