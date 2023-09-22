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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('prefix',18)->unique();

            $table->string('title'); 
            $table->longText('note')->nullable();        
            $table->longText('noteForClient')->nullable();        
            $table->float('leadValue')->nullable();
            $table->float('advanceValue')->nullable();

            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('salessources');     
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('sales_types');     
            $table->date('executionDate'); 
            $table->time('executionTime')->nullable();
            
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('client_prefix')->nullable();
             
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
