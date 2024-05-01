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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('location');
            $table->string('office_phone')->nullable();

            $table->unsignedBigInteger('manager_id')->nullable();
            //$table->foreign( 'manager_id' )->references('user_id')->on('managers'); // cant be null , change the manager not delete it


            
            $table->string('subscription_code')->unique()->nullable(); //to connect users with this office accourding to roles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
