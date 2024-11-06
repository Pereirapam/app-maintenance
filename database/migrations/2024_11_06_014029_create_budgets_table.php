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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTask');
            $table->unsignedBigInteger('idProfessional');
            $table->decimal('costEstimate', 10,2);
            $table->date('date');
            $table->timestamps();

            //chaves estrangeiras
            $table->foreign('idTask')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('idProfessional')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
