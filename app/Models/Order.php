<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'quantity',
        'total_amount',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}