<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول الحقل :attribute.',
    'accepted_if' => 'يجب قبول الحقل :attribute عندما يكون :other هو :value.',
    'active_url' => 'الحقل :attribute يجب أن يكون رابط صحيح.',
    'after' => 'الحقل :attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal' => 'الحقل :attribute يجب أن يكون تاريخ بعد أو يساوي :date.',
    'alpha' => 'الحقل :attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => 'الحقل :attribute يجب أن يحتوي على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'الحقل :attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => 'الحقل :attribute يجب أن يكون مصفوفة.',
    'ascii' => 'الحقل :attribute يجب أن يحتوي على أحرف وأرقام ورمز أحادية البايت فقط.',
    'before' => 'الحقل :attribute يجب أن يكون تاريخ قبل :date.',
    'before_or_equal' => 'الحقل :attribute يجب أن يكون تاريخ قبل أو يساوي :date.',
    'between' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :min إلى :max عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون بين :min و :max.',
        'string' => 'الحقل :attribute يجب أن يكون بين :min و :max حرف.',
    ],
    'boolean' => 'الحقل :attribute يجب أن يكون صحيح أو خطأ.',
    'can' => 'الحقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'تأكيد الحقل :attribute لا يتطابق.',
    'contains' => 'الحقل :attribute يفتقد إلى قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'الحقل :attribute يجب أن يكون تاريخ صحيح.',
    'date_equals' => 'الحقل :attribute يجب أن يكون تاريخ يساوي :date.',
    'date_format' => 'الحقل :attribute يجب أن يتطابق مع الصيغة :format.',
    'decimal' => 'الحقل :attribute يجب أن يحتوي على :decimal أرقام عشرية.',
    'declined' => 'الحقل :attribute يجب أن يتم رفضه.',
    'declined_if' => 'الحقل :attribute يجب أن يتم رفضه عندما يكون :other هو :value.',
    'different' => 'الحقل :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'الحقل :attribute يجب أن يكون :digits أرقام.',
    'digits_between' => 'الحقل :attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => 'الحقل :attribute له أبعاد صورة غير صحيحة.',
    'distinct' => 'الحقل :attribute له قيمة مكررة.',
    'doesnt_end_with' => 'الحقل :attribute يجب ألا ينتهي بأحد التالي: :values.',
    'doesnt_start_with' => 'الحقل :attribute يجب ألا يبدأ بأحد التالي: :values.',
    'email' => 'الحقل :attribute يجب أن يكون عنوان بريد إلكتروني صحيح.',
    'ends_with' => 'الحقل :attribute يجب أن ينتهي بأحد التالي: :values.',
    'enum' => 'القيمة المختارة للحقل :attribute غير صحيحة.',
    'exists' => 'القيمة المختارة للحقل :attribute غير صحيحة.',
    'extensions' => 'الحقل :attribute يجب أن يكون له أحد الامتدادات التالية: :values.',
    'file' => 'الحقل :attribute يجب أن يكون ملف.',
    'filled' => 'الحقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من :value حرف.',
    ],
    'gte' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :value عنصر أو أكثر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
    ],
    'hex_color' => 'الحقل :attribute يجب أن يكون لون ست عشري صحيح.',
    'image' => 'الحقل :attribute يجب أن يكون صورة.',
    'in' => 'القيمة المختارة للحقل :attribute غير صحيحة.',
    'in_array' => 'الحقل :attribute يجب أن يوجد في :other.',
    'integer' => 'الحقل :attribute يجب أن يكون رقم صحيح.',
    'ip' => 'الحقل :attribute يجب أن يكون عنوان IP صحيح.',
    'ipv4' => 'الحقل :attribute يجب أن يكون عنوان IPv4 صحيح.',
    'ipv6' => 'الحقل :attribute يجب أن يكون عنوان IPv6 صحيح.',
    'json' => 'الحقل :attribute يجب أن يكون نص JSON صحيح.',
    'list' => 'الحقل :attribute يجب أن يكون قائمة.',
    'lowercase' => 'الحقل :attribute يجب أن يكون بأحرف صغيرة.',
    'lt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أقل من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من :value حرف.',
    ],
    'lte' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value حرف.',
    ],
    'mac_address' => 'الحقل :attribute يجب أن يكون عنوان MAC صحيح.',
    'max' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max عنصر.',
        'file' => 'الحقل :attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب ألا يكون أكبر من :max.',
        'string' => 'الحقل :attribute يجب ألا يكون أكبر من :max حرف.',
    ],
    'max_digits' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max أرقام.',
    'mimes' => 'الحقل :attribute يجب أن يكون ملف من نوع: :values.',
    'mimetypes' => 'الحقل :attribute يجب أن يكون ملف من نوع: :values.',
    'min' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :min عنصر على الأقل.',
        'file' => 'الحقل :attribute يجب أن يكون :min كيلوبايت على الأقل.',
        'numeric' => 'الحقل :attribute يجب أن يكون :min على الأقل.',
        'string' => 'الحقل :attribute يجب أن يكون :min حرف على الأقل.',
    ],
    'min_digits' => 'الحقل :attribute يجب أن يحتوي على :min أرقام على الأقل.',
    'missing' => 'الحقل :attribute يجب أن يكون مفقود.',
    'missing_if' => 'الحقل :attribute يجب أن يكون مفقود عندما يكون :other هو :value.',
    'missing_unless' => 'الحقل :attribute يجب أن يكون مفقود ما لم يكن :other هو :value.',
    'missing_with' => 'الحقل :attribute يجب أن يكون مفقود عندما يكون :values موجود.',
    'missing_with_all' => 'الحقل :attribute يجب أن يكون مفقود عندما تكون :values موجودة.',
    'multiple_of' => 'الحقل :attribute يجب أن يكون مضاعف لـ :value.',
    'not_in' => 'القيمة المختارة للحقل :attribute غير صحيحة.',
    'not_regex' => 'صيغة الحقل :attribute غير صحيحة.',
    'numeric' => 'الحقل :attribute يجب أن يكون رقم.',
    'password' => [
        'letters' => 'الحقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'الحقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير واحد على الأقل.',
        'numbers' => 'الحقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'الحقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'كلمة المرور المقدمة ظهرت في تسريب بيانات. يرجى اختيار كلمة مرور مختلفة.',
    ],
    'present' => 'الحقل :attribute يجب أن يكون موجود.',
    'present_if' => 'الحقل :attribute يجب أن يكون موجود عندما يكون :other هو :value.',
    'present_unless' => 'الحقل :attribute يجب أن يكون موجود ما لم يكن :other في :values.',
    'present_with' => 'الحقل :attribute يجب أن يكون موجود عندما يكون :values موجود.',
    'present_with_all' => 'الحقل :attribute يجب أن يكون موجود عندما تكون :values موجودة.',
    'prohibited' => 'الحقل :attribute محظور.',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'الحقل :attribute محظور ما لم يكن :other في :values.',
    'prohibits' => 'الحقل :attribute يمنع :other من الوجود.',
    'regex' => 'صيغة الحقل :attribute غير صحيحة.',
    'required' => 'الحقل :attribute مطلوب.',
    'required_array_keys' => 'الحقل :attribute يجب أن يحتوي على إدخالات لـ: :values.',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_if_accepted' => 'الحقل :attribute مطلوب عندما يتم قبول :other.',
    'required_if_declined' => 'الحقل :attribute مطلوب عندما يتم رفض :other.',
    'required_unless' => 'الحقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => 'الحقل :attribute مطلوب عندما يكون :values موجود.',
    'required_with_all' => 'الحقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'الحقل :attribute مطلوب عندما لا يكون :values موجود.',
    'required_without_all' => 'الحقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => 'الحقل :attribute يجب أن يتطابق مع :other.',
    'size' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :size عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون :size.',
        'string' => 'الحقل :attribute يجب أن يكون :size حرف.',
    ],
    'starts_with' => 'الحقل :attribute يجب أن يبدأ بأحد التالي: :values.',
    'string' => 'الحقل :attribute يجب أن يكون نص.',
    'timezone' => 'الحقل :attribute يجب أن يكون منطقة زمنية صحيحة.',
    'unique' => 'الحقل :attribute تم أخذه مسبقاً.',
    'uploaded' => 'فشل رفع الحقل :attribute.',
    'uppercase' => 'الحقل :attribute يجب أن يكون بأحرف كبيرة.',
    'url' => 'الحقل :attribute يجب أن يكون رابط صحيح.',
    'ulid' => 'الحقل :attribute يجب أن يكون ULID صحيح.',
    'uuid' => 'الحقل :attribute يجب أن يكون UUID صحيح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],
    'company_name_required' => 'اسم الشركة مطلوب.',
    'commercial_number_required' => 'الرقم التجاري مطلوب.',
    'commercial_number_unique' => 'الرقم التجاري يجب أن يكون فريد.',
    'commercial_number_max' => 'الرقم التجاري يجب ألا يتجاوز 50 حرف.',
    'tax_number_max' => 'رقم الملف الضريبي يجب ألا يتجاوز 50 حرف.',
    'phone_required' => 'رقم الهاتف مطلوب.',
    'phone_max' => 'رقم الهاتف يجب ألا يتجاوز 20 حرف.',
    'mobile_max' => 'رقم الجوال يجب ألا يتجاوز 20 حرف.',
    'website_url' => 'الموقع الإلكتروني يجب أن يكون رابط صحيح.',
    'facebook_url' => 'رابط فيسبوك يجب أن يكون رابط صحيح.',
    'instagram_url' => 'رابط إنستغرام يجب أن يكون رابط صحيح.',
    'twitter_url' => 'رابط تويتر يجب أن يكون رابط صحيح.',
    'country_id_required' => 'يرجى اختيار دولة.',
    'country_id_exists' => 'الدولة المختارة غير صحيحة.',
    'city_id_required' => 'يرجى اختيار مدينة.',
    'city_id_exists' => 'المدينة المختارة غير صحيحة.',
    'area_id_exists' => 'المنطقة المختارة غير صحيحة.',
    'address_max' => 'العنوان يجب ألا يتجاوز 500 حرف.',
    'status_required' => 'حقل الحالة مطلوب.',
    'status_boolean' => 'الحالة يجب أن تكون صحيح أو خطأ.',
]; 