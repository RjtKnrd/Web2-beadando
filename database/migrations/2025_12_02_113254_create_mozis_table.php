<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mozis', function (Blueprint $table) {
            $table->id(); 
            $table->integer('moziazon')->unique(); 
            $table->string('mozinev')->nullable();
            $table->string('irszam')->nullable();
            $table->string('cim')->nullable();
            $table->string('telefon')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mozis');
    }
};