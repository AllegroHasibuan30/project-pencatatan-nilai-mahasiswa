<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama",25);
            $table->enum("jurusan",['ti','si']);
            $table->enum("semester",[1,2,3,4,5,6,7,8]);
            $table->string("nilai",10-100);
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
        Schema::dropIfExists('tblnilai');
    }
}
  