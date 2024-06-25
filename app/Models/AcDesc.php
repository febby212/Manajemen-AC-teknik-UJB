<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcDesc extends Model
{
    use HasFactory;
    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'kode_AC',
        'id_jumlah',
        'merek_id',
        'kelengkapan',
        'ruangan',
        'kondisi',
        'desc_kondisi',
        'tahun_pembelian',
        'created_by',
        'updated_by',
    ];

    public function history() {
        return $this->hasMany(History::class, 'ac_desc_id', 'id');
    }

    public function merekAC() {
        return $this->belongsTo(MerekAC::class, 'merek_id', 'id');
    }

    public function predictedAC() : HasMany {
        return $this->hasMany(HasilHistory::class, 'dataAc_id', 'id');
    }

    public function dataACReported() : HasMany {
        return $this->hasMany(ReportDamageAC::class, 'ac_desc_id', 'id');
    }
}
