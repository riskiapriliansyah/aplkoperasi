<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tkegiatan extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $dates = ['tgl'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
