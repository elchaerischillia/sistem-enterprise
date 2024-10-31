<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    // Relasi many-to-many dengan customers melalui tabel send_promotions
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'send_promotions')
                    ->withPivot('sent_date')
                    ->withTimestamps();
    }
}
