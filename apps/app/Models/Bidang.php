<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class)->withPivot('jabatan')->withTimestamps();
    }
}
