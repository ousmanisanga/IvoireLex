<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'lois_id',
        'typeTexte'
    ];


    protected $table = 'references';

    public function lois()
    {
        return $this->belongsTo(Loi::class, 'lois_id');
    }





}
