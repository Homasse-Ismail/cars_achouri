<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientVehicule;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations'; // Table name
    protected $primaryKey = 'IdReservation'; // Primary key

    protected $fillable = [
        'DateFinReservation',
        'DateDebutReservation',
    ];

    public function ClientVehicule(){
        return $this->belongsTo(ClientVehicule::class,'IdClientVehicule');
    }
}
