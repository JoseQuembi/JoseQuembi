<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name'); // Nome do sistema
            $table->string('tagline')->nullable(); // Slogan ou tagline do sistema
            $table->text('description')->nullable(); // Descrição do sistema
            $table->string('email')->nullable(); // Email de contato
            $table->string('phone')->nullable(); // Telefone de contato
            $table->string('address')->nullable(); // Endereço físico
            $table->string('logo')->nullable(); // Caminho para o logo do sistema
            $table->string('favicon')->nullable(); // Caminho para o favicon do sistema
            $table->string('social_facebook')->nullable(); // Link para a página do Facebook
            $table->string('social_twitter')->nullable(); // Link para a página do Twitter
            $table->string('social_linkedin')->nullable(); // Link para a página do LinkedIn
            $table->string('social_instagram')->nullable(); // Link para a página do Instagram
            $table->text('footer_text')->nullable(); // Texto do rodapé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings');
    }
}
