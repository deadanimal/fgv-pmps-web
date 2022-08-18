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
        Schema::create('matlamats', function (Blueprint $table) {
            $table->id();
            $table->integer('proses')->nullable();
            $table->integer('tahun')->nullable();
            $table->integer('matlamat_tahunan')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('matlamat_bulanan')->nullable();
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->string('modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matlamats');
    }
};
