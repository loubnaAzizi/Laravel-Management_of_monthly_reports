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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role');
            $table->string('password');
            $table->unsignedBigInteger('services_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('CIN');       
            $table->string('emailPrson');                    
            $table->string('grade');
            $table->string('telephon');
            $table->integer('N_SOM')->unique();
            $table->string('statue');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
