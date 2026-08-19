<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barangmasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuks';
    protected $fillable = [
        'kode_transaksi',
        'barang_id',
        'supplier_id',
        'jumlah',
        'tanggal_masuk',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
}
