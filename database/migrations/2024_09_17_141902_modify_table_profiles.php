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
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('stack');
            $table->dropColumn('location');
            $table->dropColumn('phone');
            $table->text('introduction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text('stack');
            $table->text('location');
            $table->string('phone')->nullable();
            $table->dropColumn('introduction');
        });
    }
};
