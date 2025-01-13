<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agence;
use App\Models\ClientVehicule;
class Vehicule extends Model
{
    use HasFactory;

    protected $table = 'vehicules'; // Table name
    protected $primaryKey = 'IdVehicule'; // Primary key

    protected $fillable = [
        'Matricule',
        'Marque',
        'Model',
        'Annee',
        'Type',
        'PrixJour',
        'IdAgence',
        'IdReservation',
        'StatuVehicule',
    ];

    // Relationships
    public function agence()
    {
        return $this->belongsTo(Agence::class,  'IdAgence');
    }

    public function ClientVehicule()
    {
        return $this->hasOne(ClientVehicule::class , 'IdClientVehicule');
    }
}
