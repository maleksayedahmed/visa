# Multilingual Support Guide

This guide explains how to use the multilingual functionality implemented for VisaType and Visa models using Spatie Laravel Translatable.

## Overview

The VisaType and Visa controllers now support both English and Arabic languages. The implementation uses the Spatie Laravel Translatable package to store and retrieve multilingual content.

## Models

### VisaType Model
- **Translatable fields**: `name`
- **Languages supported**: English (en) and Arabic (ar)

### Visa Model
- **Translatable fields**: `name`, `description`, `visa_type`
- **Languages supported**: English (en) and Arabic (ar)

## Database Structure

The translatable fields are stored as JSON in the database with the following structure:
```json
{
  "en": "English text",
  "ar": "Arabic text"
}
```

## Usage Examples

### Creating Records

```php
// Create a VisaType with multilingual data
$visaType = VisaType::create([
    'name' => [
        'en' => 'Tourist Visa',
        'ar' => 'تأشيرة سياحية'
    ]
]);

// Create a Visa with multilingual data
$visa = Visa::create([
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
    'country_id' => 1,
    'cost' => 500.00,
    'slug' => 'saudi-tourist-visa',
    'status' => 1
]);
```

### Retrieving Translations

```php
// Get specific translation
$englishName = $visaType->getTranslation('name', 'en');
$arabicName = $visaType->getTranslation('name', 'ar');

// Get translation in current locale
$currentName = $visaType->name; // Automatically uses current app locale

// Set locale and get translation
app()->setLocale('ar');
$arabicName = $visa->name; // Returns Arabic name
```

### Updating Translations

```php
// Update specific translation
$visaType->setTranslation('name', 'en', 'Updated English Name');
$visaType->setTranslation('name', 'ar', 'الاسم المحدث بالعربية');
$visaType->save();

// Update multiple translations at once
$visaType->update([
    'name' => [
        'en' => 'New English Name',
        'ar' => 'اسم جديد بالعربية'
    ]
]);
```

## Controllers

### VisaTypeController
- **Store/Update validation**: Validates both English and Arabic fields
- **Form fields**: Separate input fields for English and Arabic names

### VisaController
- **Store/Update validation**: Validates all translatable fields in both languages
- **Form fields**: Separate input fields for name, description, and visa_type in both languages

## Views

### Create/Edit Forms
The forms now include separate input fields for each language:
- `name[en]` and `name[ar]` for VisaType
- `name[en]`, `name[ar]`, `description[en]`, `description[ar]`, `visa_type_id` for Visa

### Index Views
The index views automatically display content in the current application locale.

## Language Files

Translation keys have been added to:
- `lang/en/attributes.php`
- `lang/ar/attributes.php`

## Testing

Run the multilingual tests to verify functionality:
```bash
php artisan test tests/Feature/MultilingualVisaTest.php
```

## Migration

The database migration `2025_07_26_212318_update_tables_for_translations.php` converts existing string fields to JSON format and preserves existing data by duplicating it in both languages.

## Seeders

Sample multilingual data is available in:
- `VisaTypeSeeder`: Sample visa types in English and Arabic
- `VisaSeeder`: Sample visas with multilingual content

Run seeders with:
```bash
php artisan db:seed --class=VisaTypeSeeder
php artisan db:seed --class=VisaSeeder
```

## Configuration

The application supports English and Arabic locales as configured in `config/app.php`:
```php
'locale' => env('APP_LOCALE', 'en'),
'locales' => [
    'en',
    'ar'
],
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
```

## Best Practices

1. Always validate both language fields in controllers
2. Use the `getTranslation()` method for specific language access
3. Use the direct property access for current locale display
4. Ensure all translatable fields have content in both languages
5. Test the application in both locales to ensure proper display 