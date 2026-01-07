<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis jamak -> pelanggans)
    protected $table = 'pelanggans';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
    ];

    // Relasi ke pesanan
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
