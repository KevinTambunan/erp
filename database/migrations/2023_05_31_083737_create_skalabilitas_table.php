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
        Schema::create('skalabilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erp_id');
            $table->string('deskripsi');

            $table->foreign('erp_id')->on('erps')->references('id');
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
        Schema::dropIfExists('skalabilitas');
    }
};
