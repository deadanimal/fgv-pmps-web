<?php

use App\Models\Pollen;
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
        Schema::create('stok_pollens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pollen::class)->nullable()->constrained()->cascadeOnDelete();
            $table->double('amaun_keluar')->nullable();
            $table->double('amaun_kembali')->nullable();
            $table->double('amaun_semasa')->nullable();
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
        Schema::dropIfExists('stok_pollens');
    }
};
