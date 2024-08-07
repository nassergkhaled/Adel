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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            //$table->json('name'); // Multi-value attribute stored as JSON
            $table->boolean('completeRegistration')->default(0);
            $table->string('phone_number', 15)->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider_id')->nullable();


            $table->unsignedBigInteger('office_id')->nullable();
            $table->boolean('acceptedByManager')->default(0); // -1:decline 0:pending 1:accepted
            $table->boolean('access')->default(1); // to let the manager give access to members or not


            $table->unsignedbigInteger('id_number')->unique()->nullable(); //National id
            $table->string('role', 12)->nullable(); // Secretary, Manager, Lawyer, Client



            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
