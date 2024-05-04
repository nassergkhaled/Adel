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
            $table->unsignedBigInteger('id')->primary();
            $table->foreign( 'id' )->references('id')->on('users') ->onDelete('cascade');

            $table->string('manager_name', 255);
            // $table->string('phone_number', 15)->unique();
            // $table->date('hiring_date');
            // $table->string('address')->nullable();

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
