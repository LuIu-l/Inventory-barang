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
        Schema::create('barangmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 30)->unique();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('supplier_id');
            $table->integer('jumlah');
            $table->date('tanggal_masuk');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangmasuks');
    }
};
