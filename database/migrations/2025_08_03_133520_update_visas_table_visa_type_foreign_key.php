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
        // First, create a temporary column to store the visa_type_id
        Schema::table('visas', function (Blueprint $table) {
            $table->unsignedBigInteger('visa_type_id')->nullable()->after('visa_type');
        });

        // Migrate data from JSON visa_type to foreign key
        $visas = DB::table('visas')->get();
        foreach ($visas as $visa) {
            $visaTypeJson = json_decode($visa->visa_type, true);
            if ($visaTypeJson && isset($visaTypeJson['en'])) {
                // Find the visa type by English name
                $visaType = DB::table('visa_types')
                    ->whereRaw("JSON_EXTRACT(name, '$.en') = ?", [$visaTypeJson['en']])
                    ->first();
                
                if ($visaType) {
                    DB::table('visas')
                        ->where('id', $visa->id)
                        ->update(['visa_type_id' => $visaType->id]);
                }
            }
        }

        // Drop the old visa_type column
        Schema::table('visas', function (Blueprint $table) {
            $table->dropColumn('visa_type');
        });

        // Rename visa_type_id to visa_type_id and add foreign key constraint
        Schema::table('visas', function (Blueprint $table) {
            $table->renameColumn('visa_type_id', 'visa_type_id');
        });

        // Add foreign key constraint
        Schema::table('visas', function (Blueprint $table) {
            $table->foreign('visa_type_id')->references('id')->on('visa_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove foreign key constraint
        Schema::table('visas', function (Blueprint $table) {
            $table->dropForeign(['visa_type_id']);
        });

        // Add back the old visa_type column
        Schema::table('visas', function (Blueprint $table) {
            $table->json('visa_type')->after('country_id');
        });

        // Migrate data back from foreign key to JSON
        $visas = DB::table('visas')->get();
        foreach ($visas as $visa) {
            if ($visa->visa_type_id) {
                $visaType = DB::table('visa_types')->where('id', $visa->visa_type_id)->first();
                if ($visaType) {
                    $visaTypeName = json_decode($visaType->name, true);
                    DB::table('visas')
                        ->where('id', $visa->id)
                        ->update(['visa_type' => json_encode($visaTypeName)]);
                }
            }
        }

        // Drop the visa_type_id column
        Schema::table('visas', function (Blueprint $table) {
            $table->dropColumn('visa_type_id');
        });
    }
};
