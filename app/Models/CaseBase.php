<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseBase extends Model
{
    use HasFactory;

    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'kd_gejala',
        'kd_penyakit',
        'bobot',
        'created_by',
        'updated_by',
    ];
}
