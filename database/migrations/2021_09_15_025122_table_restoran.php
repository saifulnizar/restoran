<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRestoran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {   
        Schema::create('reseps', function (Blueprint $table){
            $table->id();
            $table->foreignId('resep_id')->index()->nullable();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('bahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->index();
            $table->string('name');
            $table->string('katerangan');
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
        Schema::drop('bahans');
        Schema::drop('kategoris');
        Schema::drop('reseps');
    }
}
