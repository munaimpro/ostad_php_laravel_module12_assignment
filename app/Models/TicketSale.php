<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSale extends Model
{
    use HasFactory;
    protected $table = "ticket_sales";
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'bus_id',
        'from',
        'to',
        'doj',
        'seat',
        'fare',
        'amount',
    ];
}
