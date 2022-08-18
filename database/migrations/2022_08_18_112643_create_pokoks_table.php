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
        Schema::create('pokoks', function (Blueprint $table) {
            $table->id();
            $table->string('no_pokok')->nullable();
            $table->integer('jantina')->nullable();
            $table->string('baka')->nullable();
            $table->string('progeny')->nullable();
            $table->string('blok')->nullable();
            $table->string('trial')->nullable();
            $table->string('status_pokok')->nullable();
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
        Schema::dropIfExists('pokoks');
    }
};
