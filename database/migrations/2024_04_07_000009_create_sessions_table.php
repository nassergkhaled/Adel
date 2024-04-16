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

            $table->dateTime('date');
            $table->string('type');
            $table->string('status');
            $table->integer('duration');
            $table->text('notes')->nullable();
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
