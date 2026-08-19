<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 20)->unique();
            $table->string('nama_barang', 150);
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->default(0);
            $table->string('satuan', 20);
            $table->timestamps();
            $table->foreign('jenis_id')->references('id')->on('jenis');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
