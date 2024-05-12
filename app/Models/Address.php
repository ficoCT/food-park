<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    function deliveryArea() : BelongsTo {
        return $this->belongsTo(DeliveryArea::class);
    }
}
