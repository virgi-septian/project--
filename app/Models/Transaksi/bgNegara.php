<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Regency;

class BgNegara extends Model
{
    use HasFactory;
    protected $table = 'tbl_transaksi_bg_negara';
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
