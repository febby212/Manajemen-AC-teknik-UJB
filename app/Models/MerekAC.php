<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerekAC extends Model
{
    use HasFactory;
    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'merek',
        'seri',
        'created_by',
        'updated_by',
    ];

    public function Ac() {
        return $this->hasMany(AcDesc::class, 'merek_id', 'id');
    }
}
