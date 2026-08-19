<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'telepon',
    ];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }

    public function barangMasuk()
    {
        return $this->hasMany(barangmasuk::class);
    }
}
