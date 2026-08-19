<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
    ];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }
}
