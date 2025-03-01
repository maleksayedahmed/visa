<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('visas', function (Blueprint $table) {
            if (!Schema::hasColumn('visas', 'country_id')) {
                $table->unsignedBigInteger('country_id')->after('description'); // No foreign key constraint
            }
            if (!Schema::hasColumn('visas', 'visa_type')) {
                $table->string('visa_type')->after('country_id');
            }
            if (!Schema::hasColumn('visas', 'cost')) {
                $table->decimal('cost', 10, 2)->nullable()->after('visa_type');
            }
        });
    }

    public function down()
    {
        Schema::table('visas', function (Blueprint $table) {
            if (Schema::hasColumn('visas', 'country_id')) {
                $table->dropColumn('country_id');
            }
            if (Schema::hasColumn('visas', 'visa_type')) {
                $table->dropColumn('visa_type');
            }
            if (Schema::hasColumn('visas', 'cost')) {
                $table->dropColumn('cost');
            }
        });
    }
};
