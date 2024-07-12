<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_chef',
        'mois',
        'annee',
        'montant',
        'date_de_paiement',
    ];

    public function menage()
    {
        return $this->belongsTo(Menage::class);
    }
}
