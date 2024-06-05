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
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('status')->default('en attente');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('mechanicNotes')->nullable();
            $table->string('clientNotes')->nullable();
            $table->unsignedBigInteger('mecanic_id')->nullable();
            $table->foreign('mecanic_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('vehicule_id')->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
