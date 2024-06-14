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
        Schema::create('case_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->foreign('case_id')->references('id')->on('legal_cases')->onDelete('cascade');

            $table->dateTime('session_Date');
            $table->string('session_name');
            $table->string('Judge_name');
            $table->string('session_location');
            $table->string('session_status');
            $table->string('file');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_sessions');
    }
};
