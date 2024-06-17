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
        Schema::create('case_session_witness', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('legal_case_id');
            $table->foreign('legal_case_id')->references('id')->on('legal_cases');

            $table->unsignedBigInteger('witness_id');
            $table->foreign('witness_id')->references('id')->on('witnesses');

            $table->unsignedBigInteger('case_session_id')->nullable();
            $table->foreign('case_session_id')->references('id')->on('case_sessions');

            $table->unique(['legal_case_id', 'witness_id', 'case_session_id'], 'unique_case_witness_session');


            $table->string('relationship'); // between  witness()->case()->client()->get();
            $table->boolean('oath_availability')->default('0');
            
            // $table->date('testimony_date'); // The date of the witness's testimony
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_session_witness');
    }
};
