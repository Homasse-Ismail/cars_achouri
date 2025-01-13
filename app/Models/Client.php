<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientVehicule;
use App\Models\User;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients'; // Table name
    protected $primaryKey = 'IdClient'; // Primary key

    protected $fillable = [
        'NomClient',
        'PrenomClient',
        'CinClient',
        'phoneClient',
        'DateNaiClient',
        'EmailClient',
        'IdUser',
        'StatusClient',
    ];

    // Relationships
    public function ClientVehicule()
    {
        return $this->hasMany(ClientVehicule::class, 'IdClient');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'IdUser');
    }
}
