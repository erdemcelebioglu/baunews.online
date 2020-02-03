<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReklam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklamlar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link1')->nullable();
            $table->text('reklam1')->nullable();
            $table->string('link2')->nullable();
            $table->text('reklam2')->nullable();
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
        Schema::dropIfExists('reklamlar');
    }
}
