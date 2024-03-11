<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     use HasFactory;

    protected $table = "customer";

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        "nama",
        "alamat",
        "no_telp",
        "paket_id"
    ];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    } 
    public function paket() : BelongsTo 
    {
        return $this->belongsTo(Paket::class);
    } 
}
