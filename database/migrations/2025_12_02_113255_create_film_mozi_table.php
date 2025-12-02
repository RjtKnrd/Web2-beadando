<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('film_mozi', function (Blueprint $table) {
            $table->id();
            $table->integer('fkod'); // film.fkod
            $table->integer('moziazon'); // mozi.moziazon
            // kényelmi indexek
            $table->index('fkod');
            $table->index('moziazon');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('film_mozi');
    }
};