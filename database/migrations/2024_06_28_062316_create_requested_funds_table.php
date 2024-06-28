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
        Schema::create('requested_funds', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete(null);


            $table->unsignedBigInteger('case_id');
            $table->foreign('case_id')->references('id')->on('legal_cases')->onDelete('cascade');

            $table->decimal('requested_amount', 10, 4);
            $table->decimal('paid_amount', 10, 4)->nullable();
            $table->string('pay_method')->nullable();
            $table->date('pay_date')->nullable();
            $table->date('due_date');
            //send data & last payment date : you can take it from timestamps (created_at,updated_at)
            $table->text("message")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_funds');
    }
};
