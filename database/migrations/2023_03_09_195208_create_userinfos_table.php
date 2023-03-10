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
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->string("BloodType");
            $table->string("Address");
            $table->string("Country");
            $table->string("provice");
            $table->string("District");
            $table->string("is_acceptor");
            $table->string("is_donor");
            $table->string("candonate")->default(0);
            $table->string("phone Number")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfos');
    }
};
