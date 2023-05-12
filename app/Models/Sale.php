<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'program_id', 'coupon_id',
        'ref_no', 'amount',
    ];

    // protected $gaurded = [];
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
