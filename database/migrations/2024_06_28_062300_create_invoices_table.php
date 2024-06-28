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
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->unsignedBigInteger('case_id');
            $table->foreign('case_id')->references('id')->on('legal_cases')->onDelete('cascade');

            $table->decimal('expenses_amount', 10, 4)->nullable();
            $table->decimal('paidFunds_amount', 10, 4)->nullable();


            $table->integer('status')->default(0);
            $table->decimal('paid_amount', 10, 4)->nullable();
            $table->string('pay_method')->nullable();
            $table->date('pay_date')->nullable();
            $table->date('due_date');
            //send data can take it from timestamps (created_at)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
