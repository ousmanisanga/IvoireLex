<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lois', function (Blueprint $table) {
            $table->id();
            $table->string('statut')->nullable(); // Utilisation de valeurs sans espaces
            $table->string('typeLoi')->nullable();
            $table->text('titre')->nullable();
            $table->string('datePublication')->nullable();
            $table->string('numeroLoi')->nullable();
            $table->string('annexe')->nullable()->default('');
            $table->text('contenu')->nullable();
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
        Schema::dropIfExists('lois');
    }
};
