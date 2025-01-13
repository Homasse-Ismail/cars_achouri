<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicule;
use App\Models\Client;

class ClientVehicule extends Model
{
    use HasFactory;

    protected $table = 'client_vehicule'; // Table name
    protected $primaryKey = 'IdClientVehicule'; // Primary key

    protected $fillable = [
        'IdVehicule',
        'IdClient',
        'IdReservation'
    ];

    public function client(){
        return $this->belongsTo(Client::class,'IdClient');
    }
    public function Vehcule(){
        return $this->belongsTo(Vehicule::class,'IdVehicule');
    }

}
