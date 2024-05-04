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
        Schema::create('client_offices', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unique(['office_id', 'client_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_offices');
    }
};
