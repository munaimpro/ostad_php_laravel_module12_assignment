<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = "buses";
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'coach_name',
        'coach_type',
        'total_seats',
    ];
}
