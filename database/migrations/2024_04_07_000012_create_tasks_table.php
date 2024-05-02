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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('case_id')->nullable(); // the task can be with no case
            $table->foreign('case_id')->references('id')->on('legal_cases');

            $table->unsignedBigInteger('created_by'); //user who created the task
            $table->foreign('created_by')->references('id')->on('users');

            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('completion_date')->nullable();
            $table->date('due_date');
            $table->string('status');
            $table->string('priority');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
