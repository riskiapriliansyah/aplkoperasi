<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
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
    public function bidang()
    {
        return $this->belongsToMany(Bidang::class)->withPivot('jabatan')->withTimestamps();
    }
    public function status()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        } else {
            return '<span class="badge badge-danger">Tidak Aktif</span>';
        }
    }
}
