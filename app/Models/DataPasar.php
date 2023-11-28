<?php

namespace App\Models;

use App\Models\Retribusi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPasar extends Model
{
    use HasFactory;
    protected $table = 'data_pasar';
    protected $fillable = ['nama_pasar'];

    public function retribusi(): HasMany
    {
        return $this->hasMany(Retribusi::class);
    }
}
