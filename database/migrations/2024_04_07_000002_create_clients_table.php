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
            //$table->id();
            $table->unsignedBigInteger('role_id')->primary();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->string('signupToken'); // to link the client to the user if he make a signup

            $table->string('full_name');
            $table->unsignedInteger('ID_number')->unique();
            $table->string('phone_number',15); // cause if the lawyer create the client then theres no use row for him to store phone number in it

            // $table->json('contact_info'); // Phone, Email

            $table->string('nationality')->nullable();
            // $table->string('address')->nullable();
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
