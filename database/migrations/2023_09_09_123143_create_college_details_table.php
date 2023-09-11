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
        Schema::create('college_details', function (Blueprint $table) {
            $table->id();
            $table->integer('college_id');
            $table->longText('info')->nullable();
            $table->longText('course')->nullable();
            $table->longText('admission')->nullable();
            $table->longText('faculty')->nullable();
            $table->longText('faq')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_details');
    }
};
