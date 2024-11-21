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
        Schema::create('materials', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('supplier');
            $table->decimal('estimated_cost', 10, 2); 
            $table->unsignedBigInteger('idTask');
            $table->foreign('idTask')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps(false); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
