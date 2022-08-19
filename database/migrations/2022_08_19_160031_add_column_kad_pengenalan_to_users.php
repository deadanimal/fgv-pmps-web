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
        Schema::table('users', function (Blueprint $table) {
            $table->string('kategori_petugas')->nullable();
            $table->string('ic_pengguna')->nullable();
            $table->string('stesen')->nullable();
            $table->string('tugasan')->nullable();
            $table->string('jangka_hayat_laluan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kategori_petugas');
            $table->dropColumn('ic_pengguna');
            $table->dropColumn('stesen');
            $table->dropColumn('tugasan');
            $table->dropColumn('jangka_hayat_laluan');
        });
    }
};
