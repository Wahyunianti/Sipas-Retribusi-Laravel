<?php

namespace App\Models;

use App\Models\Bagian;
use App\Models\DataPasar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retribusi extends Model
{
    use HasFactory;

    protected $table = 'retribusi';
    protected $fillable = ['tanggal', 'data_pasar_id', 'bagian_id', 'jumlah'];


    public function data_pasar(): BelongsTo
    {
        return $this->belongsTo(DataPasar::class, 'data_pasar_id');
    }

    public function bagian(): BelongsTo
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }

    public function setDateAttribute(string $value): void
    {
        $this->attributes['tanggal'] = date('Y-m-d', strtotime($value));
    }
}
