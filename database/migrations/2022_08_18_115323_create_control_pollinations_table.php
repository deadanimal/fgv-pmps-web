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
        Schema::create('control_pollinations', function (Blueprint $table) {
            $table->id();
            $table->integer('no_cp')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tandan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->integer('bil_pemeriksaan')->nullable();
            $table->integer('tambahan_hari')->nullable();
            $table->string('no_pollen')->nullable();
            $table->double('peratus_pollen')->nullable();
            $table->foreignId('id_sv_cp')->nullable()->references('id')->on('users');
            $table->string('gambar_cp')->nullable();
            $table->string('catatan_cp')->nullable();
            $table->integer('pengesahan_cp')->nullable();
            $table->string('catatan_pengesahan_cp')->nullable();
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
        Schema::dropIfExists('control_pollinations');
    }
};
