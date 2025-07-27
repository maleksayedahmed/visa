<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update visa_types table for translations
        // First, convert existing string data to JSON format
        $visaTypes = DB::table('visa_types')->get();
        foreach ($visaTypes as $visaType) {
            DB::table('visa_types')
                ->where('id', $visaType->id)
                ->update([
                    'name' => json_encode([
                        'en' => $visaType->name,
                        'ar' => $visaType->name
                    ])
                ]);
        }

        Schema::table('visa_types', function (Blueprint $table) {
            $table->json('name')->change();
        });

        // Update visas table for translations
        // First, convert existing string data to JSON format
        $visas = DB::table('visas')->get();
        foreach ($visas as $visa) {
            DB::table('visas')
                ->where('id', $visa->id)
                ->update([
                    'name' => json_encode([
                        'en' => $visa->name,
                        'ar' => $visa->name
                    ]),
                    'description' => json_encode([
                        'en' => $visa->description,
                        'ar' => $visa->description
                    ]),
                    'visa_type' => json_encode([
                        'en' => $visa->visa_type,
                        'ar' => $visa->visa_type
                    ])
                ]);
        }

        Schema::table('visas', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('description')->change();
            $table->json('visa_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert visas table
        Schema::table('visas', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('description')->change();
            $table->string('visa_type')->change();
        });

        // Revert visa_types table
        Schema::table('visa_types', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }
};
