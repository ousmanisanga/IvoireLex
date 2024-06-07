<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Loi extends Model
{
    use HasFactory,  Notifiable;

    protected $fillable = [
        'statut',
        'typeLoi',
        'titre',
        'datePublication',
        'numeroLoi',
        'annexe',
        'contenu',
        'fichier',
        'domaine'
    ];



    protected $table = 'lois';

    public function references()
    {
        return $this->hasMany(Reference::class, 'lois_id');
    }

}
