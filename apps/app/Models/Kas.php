<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $dates = ['tgl'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
