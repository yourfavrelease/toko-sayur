<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangterbelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangterbelis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pesanan');
            $table->string('nama_barang');
            $table->float('harga_barang',12,2);
            $table->integer('jumlah_beli');
            $table->float('subtotal',12,2);
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
        Schema::dropIfExists('barangterbelis');
    }
}
