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
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->integer('no_harvest')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tandan::class)->nullable()->constrained()->cascadeOnDelete();
            $table->double('berat_tandan')->nullable();
            $table->string('catatan_harvest')->nullable();
            $table->foreignId('id_sv_harvest')->nullable()->references('id')->on('users');
            $table->integer('pengesahan_harvest')->nullable();
            $table->string('catatan_pengesahan_harvest')->nullable();
            $table->integer('jum_tandan')->nullable();
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
        Schema::dropIfExists('harvests');
    }
};
