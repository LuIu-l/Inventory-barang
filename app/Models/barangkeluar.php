<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barangkeluar extends Model
{
    use HasFactory;

    protected $table = 'barangkeluars';
    protected $fillable = [
        'kode_transaksi',
        'barang_id',
        'jumlah',
        'tanggal_keluar',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
