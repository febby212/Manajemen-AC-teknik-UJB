<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'nama_perusahaan',
        'alamat_perusahaan',
        'created_by',
        'updated_by',
    ];

    public function token() {
        return $this->hasMany(TokenizeModel::class);
    }

    public function historyPerbaikan() {
        return $this->hasMany(History::class, 'teknisi_id', 'id');
    }
}
