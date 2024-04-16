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
        Schema::create('clients', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id')->primary();
            $table->foreign('user_id')->references('user_id')->on('roles')->onDelete('cascade');

            $table->string('full_name');
            $table->unsignedInteger('ID');

            $table->json('contact_info'); // Phone, Email

            $table->string('nationality');
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();


            $table->timestamps();
        });
         
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
