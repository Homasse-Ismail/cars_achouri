<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicule;

class Agence extends Model
{
    use HasFactory;

    protected $table = 'agences'; // Table name
    protected $primaryKey = 'IdAgence'; // Primary key

    protected $fillable = [
        'NomAgence',
        'AdresseAgence',
        'VilleAgence',
        'Contact',
        'EmailAgence',
    ];

    // Relationships
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'IdAgence');
    }
}
