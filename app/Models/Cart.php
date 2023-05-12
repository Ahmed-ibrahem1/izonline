<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'program_id', 'price',
        'coupon_id',
    ];

    public function getUser()
    {
        return User::find($this->id);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function applyCoupon()
    {
        if ($this->coupon_id == null)
            return;

        $this->coupon->applyToCart($this);
    }
}
