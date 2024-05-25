<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokenizeModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'teknisi_id',
        'token',
        'used',
        'created_by',
        'updated_by',
    ];

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class);
    }
}
