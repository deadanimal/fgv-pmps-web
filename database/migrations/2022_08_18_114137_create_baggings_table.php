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
        Schema::create('baggings', function (Blueprint $table) {
            $table->id();
            $table->integer('no_bagging')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tandan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('gambar_bagging')->nullable();
            $table->foreignId('id_sv_balut')->nullable()->references('id')->on('users');
            $table->string('catatan_bagging')->nullable();
            $table->integer('pengesahan_bagging')->nullable();
            $table->string('catatan_pengesahan_bagging')->nullable();
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
        Schema::dropIfExists('baggings');
    }
};
