<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{

    use HasFactory;
    
    protected $table = "paket";
    
    public $incrementing = false;
    
    protected $keyType = "string";

    protected $fillable = [
        "nama_paket",
        "harga_paket",
    ];

    public function y():HasMany 
    {
        return $this->hasMany(Customer::class);
    }
}
