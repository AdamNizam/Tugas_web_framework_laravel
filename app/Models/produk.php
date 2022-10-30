<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    public $fillable = ['nama','dekskripsi','harga','stock'];
    public $timestamp = false;

}
