<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer2 extends Model
{
    protected $table = 'customer_import';

    protected $fillable = [
        'id_customer_import',
        'nama_customer_import',
        'alamat_customer_import',
        'kode_pos_import'
    ];
}