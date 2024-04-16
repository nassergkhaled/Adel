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
        Schema::create('witnesses', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('ID_no', 15)->unique();
            $table->json('contact_info'); // Phone, Email
            $table->string('relationship'); // between  witness()->case()->client()->get();

            

            // $table->string('email')->unique();
            // $table->string('phone');

            $table->boolean('oath_availability')->default('0');
            $table->text('testimony')->nullable();
            $table->timestamps();
        });
    }

    /*
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('witnesses');
    }
};
