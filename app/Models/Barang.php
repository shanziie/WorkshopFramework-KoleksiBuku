<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // SESUAIKAN DENGAN DATABASE

    protected $primaryKey = 'id_barang';

    public $incrementing = false; // karena id bukan auto increment
    protected $keyType = 'string';

    public $timestamps = false; // karena kamu pakai "timestamp" bukan created_at & updated_at

    protected $fillable = [
        'id_barang',
        'nama',
        'harga'
    ];
}