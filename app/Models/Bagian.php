<?php

namespace App\Models;

use App\Models\Retribusi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bagian extends Model
{
    use HasFactory;
    protected $table = 'bagian';
    protected $fillable = ['nama_bagian'];

    public function retribusi(): HasMany
    {
        return $this->hasMany(Retribusi::class);
    }
}
