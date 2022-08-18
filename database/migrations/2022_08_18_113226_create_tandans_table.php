<?php

use App\Models\Pokok;
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
        Schema::create('tandans', function (Blueprint $table) {
            $table->id();
            $table->string('no_daftar')->nullable();
            $table->foreignIdFor(Pokok::class)->nullable()->constrained()->cascadeOnDelete();
            $table->integer('kitaran')->nullable();
            $table->string('diskripsi_kitaran')->nullable();
            $table->integer('status_tandan')->nullable();
            $table->string('catatan')->nullable();
            $table->integer('umur')->nullable();
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
        Schema::dropIfExists('tandans');
    }
};
