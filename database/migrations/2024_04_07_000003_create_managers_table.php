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
        Schema::create('managers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->foreign( 'user_id' )->references('user_id')->on('roles') ->onDelete('cascade');

            $table->string('full_name', 255);
            $table->string('phone_number', 15)->unique();
            $table->unsignedbigInteger('ID')->unique();
            $table->date('hiring_date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managers');
    }
};
