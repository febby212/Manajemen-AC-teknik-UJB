<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilHistory extends Model
{
    use HasFactory;

    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'dataAc_id',
        'umur_AC',
        'kd_penyakit',
        'kd_gejala',
        'solusi_1',
        'solusi_2',
        'created_by',
        'updated_by',
    ];

    public function userPredict() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dataACRel() : BelongsTo {
        return $this->belongsTo(AcDesc::class, 'dataAc_id', 'id');
    }
}
