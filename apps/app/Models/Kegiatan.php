<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function status()
    {
        if ($this->status == 1) {
            return "<span class='badge badge-primary'>Aktif</span>";
        } else {
            return "<span class='badge badge-danger'>Tidak Aktif</span>";
        }
    }
}
