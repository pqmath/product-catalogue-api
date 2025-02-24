<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 45);
            $table->text('descricao')->nullable();
            $table->timestamps();  // Isso cria automaticamente os campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
