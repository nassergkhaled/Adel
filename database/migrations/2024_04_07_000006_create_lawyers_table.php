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
        Schema::create('lawyers', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->primary();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('full_name');
            // $table->unsignedInteger('id_number')->unique();


            // $table->date('birthday');
            // $table->boolean('gender')->default(null);
            // $table->string('registration_no',15)->unique();
            // $table->unsignedTinyInteger('exp_years');

            // id, reg_licenseو CV scan will be in S3 Bucket

            // $table->json('contact_info'); // phone, Email
            // $table->string('address')->nullable();


            $table->string('specialization');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
