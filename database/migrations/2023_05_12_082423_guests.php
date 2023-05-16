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
        Schema::create('guests', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->bigInteger('number_id');
            $table->bigInteger('phone');
            $table->date('checkin');
            $table->date('checkout');
            $table->string('room');
            $table->integer('payment');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('room')->references('id')->on('rooms');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
