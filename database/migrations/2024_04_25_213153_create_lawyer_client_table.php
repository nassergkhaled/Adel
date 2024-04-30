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
        Schema::create('lawyer_client', function (Blueprint $table) {
            // Assuming user_id in lawyers table and role_id in clients table are used for linking
            $table->unsignedBigInteger('lawyer_user_id');
            $table->unsignedBigInteger('client_role_id');
            $table->timestamps();

            // Foreign key referencing the primary key in the lawyers table
            $table->foreign('lawyer_user_id')->references('user_id')->on('lawyers')->onDelete('cascade');

            // Foreign key referencing the primary key in the clients table
            $table->foreign('client_role_id')->references('role_id')->on('clients')->onDelete('cascade');

            // To prevent assigning the same client to the same lawyer more than once
            $table->unique(['lawyer_user_id', 'client_role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_client');
    }
};