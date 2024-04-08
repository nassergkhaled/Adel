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
        Schema::create('case_witnesses', function (Blueprint $table) {
            $table->foreignId('case_id')->constrained('legal_cases')->onDelete('cascade');
            $table->foreignId('witness_id')->constrained('witnesses')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_witnessess');
    }
};
