<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYazilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazilar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('baslik');
            $table->text('icerik');
            $table->string('slug');
            $table->integer('kategori');
            $table->integer('user_id');
            $table->string('resim');
            $table->string('video')->nullable();
            $table->string('slider');
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
        Schema::dropIfExists('yazilar');
    }
}
