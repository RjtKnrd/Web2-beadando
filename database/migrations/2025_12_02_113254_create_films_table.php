<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->integer('fkod')->unique(); // az eredeti fájl azonosítója
            $table->string('filmcim')->nullable();
            $table->integer('szines')->nullable();
            $table->string('szinkron')->nullable();
            $table->string('szarmazas')->nullable();
            $table->string('mufaj')->nullable();
            $table->integer('hossz')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('films');
    }
};