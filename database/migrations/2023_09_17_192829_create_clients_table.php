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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('prefix',18)->unique();
            $table->string('name');
            $table->fullText('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('social')->nullable();
            $table->string('firm')->nullable();
            $table->longText('note')->nullable();         
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
        Schema::dropIfExists('clients');
    }
};
