<?php

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
        Schema::create('schedule_plans', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_pengguna')->nullable()->references('no_kakitangan')->on('users');
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->integer('no_task')->nullable();
            $table->string('nama_task')->nullable();
            $table->string('tarikh_task')->nullable();
            $table->string('keterangan_task')->nullable();
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
        Schema::dropIfExists('schedule_plans');
    }
};
