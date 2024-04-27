<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'ac_desc_id',
        'kerusakan',
        'perbaikan',
        'pos_anggaran',
        'tgl_perbaikan',
        'PPA',
        'teknisi_id',
        'biaya',
        'mengetahui',
        'menyetujui',
        'created_by',
        'updated_by',
    ];

    public function acDesc() {
        return $this->belongsTo(AcDesc::class, 'ac_desc_id', 'id');
    }

    public function teknisiPerbaikan() {
        return $this->belongsTo(Teknisi::class, 'teknisi_id', 'id');
    }

    public function pembuatLaporan() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
