<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameKategoriColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yazilar', function(Blueprint $table) {
            $table->renameColumn('kategori', 'kategori_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yazilar', function(Blueprint $table) {
            $table->renameColumn('kategori_id', 'kategori');
        });
    }
}
