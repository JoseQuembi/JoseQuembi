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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do recurso
            $table->string('slug');
            $table->enum('type', ['humano', 'material', 'financeiro']); // Tipo de recurso
            $table->integer('quantity')->nullable(); // Quantidade disponível (opcional)
            $table->decimal('unit_cost', 10, 2)->nullable(); // Custo por unidade (opcional)
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Relacionamento com a tabela de projetos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
