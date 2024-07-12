<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menage extends Model
{
    use HasFactory;
    protected $fillable = [
        'Noms','Prenoms','Sexe','DateN','Origine','Fonction'
    ];

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class,'id_chef');
    }
}
