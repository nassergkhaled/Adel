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
        Schema::table('offices', function (Blueprint $table) {
            
            $table->foreign( 'manager_id' )->references('id')->on('managers'); // cant be null , change the manager not delete it
        });
        // Schema::table('managers', function (Blueprint $table) {
            
        //     $table->foreign( 'office_id' )->references('id')->on('offices'); // cant be null , change the manager not delete it
        // });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
