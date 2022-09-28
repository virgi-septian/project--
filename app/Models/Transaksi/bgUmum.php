<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Regency;

class BgUmum extends Model
{
    use HasFactory;

    protected $table = 'tbl_transaksi_bg_umum';
    protected $guarded = 'id';

    public function province()
    {
        return $this->belongsTo(Province::class,);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'id_kota');
    }
}
