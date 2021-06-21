<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $dates = ['tgl_lahir'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function kk()
    {
        return $this->belongsTo(Kk::class);
    }

    public function status()
    {
        if ($this->status == false) {
            return '<span class="badge badge-warning">Belum dikonfirmasi</span>';
        } else {
            return '<span class="badge badge-success">Sukses</span>';
        }
    }
}
