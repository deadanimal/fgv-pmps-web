<?php

use App\Models\Pokok;
use App\Models\Tandan;
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
        Schema::create('pollens', function (Blueprint $table) {
            $table->id();
            $table->string('no_pollen')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tandan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('masa_masuk_pertama')->nullable();
            $table->string('masa_keluar_pertama')->nullable();
            $table->string('tarikh_ketuk')->nullable();
            $table->string('masa_masuk_kedua')->nullable();
            $table->string('masa_keluar_kedua')->nullable();
            $table->string('tarikh_ayak')->nullable();
            $table->float('berat_pollen')->nullable();
            $table->integer('bil_uji')->nullable();
            $table->string('tarikh_uji')->nullable();
            $table->string('masa_uji')->nullable();
            $table->string('viabiliti_pollen')->nullable();
            $table->string('tarikh_qc')->nullable();
            $table->foreignId('id_pemeriksa')->nullable()->references('id')->on('users');
            $table->string('catatan')->nullable();
            $table->integer('pengesahan_pollen')->nullable();
            $table->string('catatan_pengesahan_pollen')->nullable();
            $table->foreignId('id_sv_pollen')->nullable()->references('id')->on('users');
            $table->integer('status_pollen')->nullable();
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('pollens');
    }
};
