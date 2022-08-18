<?php

use App\Models\Pokok;
use App\Models\Tandan;
use App\Models\User;
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
        Schema::create('quality_controls', function (Blueprint $table) {
            $table->id();
            $table->integer('no_qc')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tandan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('status_bunga')->nullable();
            $table->string('status_qc')->nullable();
            $table->foreignId('id_sv_qc')->nullable()->references('id')->on('users');
            $table->string('gambar_qc')->nullable();
            $table->string('catatan_qc')->nullable();
            $table->integer('jum_bagging')->nullable();
            $table->integer('jum_bagging_lulus')->nullable();
            $table->integer('jum_bagging_rosak')->nullable();
            $table->double('peratus_rosak')->nullable();
            $table->integer('pengesahan_qc')->nullable();
            $table->string('catatan_pengesahan_qc')->nullable();
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
        Schema::dropIfExists('quality_controls');
    }
};
