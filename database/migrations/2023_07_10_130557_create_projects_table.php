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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->timestamps(6);
            $table->timestamp('start_date', 6)->nullable();
            $table->timestamp('end_date', 6)->nullable();
            $table->string('title');
            $table->string('url_image');
            $table->string('url_image_webp');
            $table->text('description');
            $table->string('project_link')->nullable();
            $table->string('source_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
