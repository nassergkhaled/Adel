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
        // Schema::create('case_role', function (Blueprint $table) {
        //     $table->unsignedBigInteger('role_id');
        //     $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        //     $table->unsignedBigInteger('case_id');
        //     $table->foreign('case_id')->references('id')->on('legal_cases')->onDelete('cascade');
        //     $table->primary(['role_id','case_id']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_role');
    }
};
