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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); //(user_id + Office_id )->primary();
            $table->unsignedBigInteger('user_id')->nullable(); // cause the client can be without user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->unsignedBigInteger('office_id')->nullable();
            // $table->foreign('office_id')->references('id')->on('offices')->onDelete(null); //if the office close it account in Adel

            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade'); //if the office close it account in Adel

            // $table->primary(['user_id', 'office_id']);

            $table->string('role', 12); // secretary, manager, Lawyer, Client


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
