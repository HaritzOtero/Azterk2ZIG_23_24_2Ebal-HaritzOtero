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
        Schema::create('alokairuas', function (Blueprint $table) {
            $table->id();
            $table->string('alokIzena');
            $table->unsignedBigInteger('yate_id');
            $table->foreign('yate_id')->references('id')->on('yateas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alokairuas');
    }
};
