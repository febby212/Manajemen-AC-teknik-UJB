<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportDamageAC extends Model
{
    use HasFactory;

    protected $cast = ['id' => 'string'];
    public $incrementing = false;

    protected $fillable = [
        'id',
        'ac_desc_id',
        'history_id',
        'kerusakan',
        'tgl_report',
        'created_by',
        'updated_by',
    ];

    public function reportHistory() : BelongsTo {
        return $this->belongsTo(History::class, 'history_id', 'id');
    }

    public function reportedData() : BelongsTo {
        return $this->belongsTo(AcDesc::class, 'ac_desc_id', 'id');
    }
}
