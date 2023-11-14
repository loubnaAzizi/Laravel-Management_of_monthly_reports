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
        Schema::create('contraints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activites_id');
            $table->foreign('activites_id')->references('id')->on('activites')->onDelete('cascade');
            $table->string('sujet');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraints');
    }
};
