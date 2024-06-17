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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('signupToken')->nullable(); // to link the client to the user if he make a signup

            $table->string('full_name');
            $table->unsignedInteger('id_number')->unique();
            $table->string('phone_number',15)->unique(); // cause if the lawyer create the client then theres no use row for him to store phone number in it

            // $table->json('contact_info'); // Phone, Email
            // $table->string('nationality')->nullable();
            // $table->string('address')->nullable();
            // $table->date('date_of_birth')->nullable();


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
