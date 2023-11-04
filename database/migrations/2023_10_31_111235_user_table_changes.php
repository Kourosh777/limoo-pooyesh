<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('ostan_id')->nullable()->after('email');
            $table->integer('shahrestan_id')->nullable()->after('ostan_id');
            $table->string('phone_number',11)->nullable()->after('shahrestan_id');
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ostan_id');
            $table->dropColumn('shahrestan_id');
            $table->dropColumn('phone_number');
        });
    }
};
