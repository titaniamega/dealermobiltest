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
        Schema::create('tipe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->string('nama_tipe');
            $table->integer('harga');
            $table->integer('harga_automatic')->nullable();
            $table->integer('minimal_angsuran')->nullable();
            $table->integer('bayar_pertama')->nullable();
            $table->text('bonus')->nullable();
            $table->timestamps();

            $table->foreign('id_produk')
            ->references('id')
            ->on('produk')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe');
    }
};
