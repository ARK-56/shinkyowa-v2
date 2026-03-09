<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = [
        "country_id",
        "stock_id",
        "name",
        "email",
        "phone",
        "country",
        "message",
        "ip"
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function stock(): BelongsTo
    {
        return  $this->belongsTo(Stock::class);
    }
}
