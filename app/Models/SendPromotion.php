<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendPromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'promotion_id',
        'sent_date',
    ];

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke model Promotion
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
