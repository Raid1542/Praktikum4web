<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table = 'tblproducts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //Field yang boleh diisi
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'harga',
    ];
}
