<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acces extends Model
{
    use HasFactory;

    protected $table = 'acces';
    // Initialize
    protected $fillable = [
        'user', 'kelola_akun', 'kelola_barang', 'transaksi', 'kelola_laporan',
    ];
}
