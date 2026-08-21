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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 10);
            $table->string('rua', 150);
            $table->integer('numero');
            $table->string('complemento', 150)->nullable();
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->foreignId('user_creation_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
