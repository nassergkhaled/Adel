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

            $table->unsignedBigInteger('relatedCase_id')->nullable(); // the task can be with no case
            $table->foreign('relatedCase_id')->references('id')->on('legal_cases');

            $table->unsignedBigInteger('relatedClient_id')->nullable(); // the task can be with no case
            $table->foreign('relatedClient_id')->references('id')->on('users');


            $table->unsignedBigInteger('created_by'); //user who created the task
            $table->foreign('created_by')->references('id')->on('users');

            $table->string('title');
            $table->date('due_date');
            $table->unsignedTinyInteger('priority');
            $table->text('description');
            $table->boolean('status'); // 0:incomplete 1:complete
            $table->boolean('reminder'); // 0:off 1:on

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