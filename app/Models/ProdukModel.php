<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table="produks";
    protected $primaryKey = 'id_produk';
    public $fillable = ['nama','dekskripsi','harga','stock','id_kategori'];
    
}
