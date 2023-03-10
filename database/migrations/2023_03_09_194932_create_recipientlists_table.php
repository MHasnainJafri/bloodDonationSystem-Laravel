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
        Schema::create('donatedblood', function (Blueprint $table) {
            $table->id();
            $table->integer("donor_id");
            $table->integer("acceptor_id");
            $table->string("blood_type");
            $table->string("provice");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donatedblood');
    }
};
