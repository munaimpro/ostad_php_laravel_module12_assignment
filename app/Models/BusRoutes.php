<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busRoutes extends Model
{
    use HasFactory;
    protected $table = "bus_fares";
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'boarding_point',
        'dropping_point',
    ];
}