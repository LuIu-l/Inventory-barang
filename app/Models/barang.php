<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis_id',
        'supplier_id',
        'harga',
        'stok',
        'satuan',
    ];

    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function barangMasuk()
    {
        return $this->hasMany(barangmasuk::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(barangkeluar::class);
    }
}
