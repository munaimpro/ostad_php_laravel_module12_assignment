<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    use HasFactory;
    protected $table = 'bus_stops';
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];
}
