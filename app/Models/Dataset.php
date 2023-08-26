<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
        'curat',
        'curas',
        'curanmor',
    ];



    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
