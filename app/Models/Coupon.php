<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount_type', 'description',
        'amount', 'user_ids', 'course_ids',
        'category_ids', 'all_users', 'all_courses',
        'usage_limit', 'valid_from', 'valid_to',
    ];

    protected $casts = [
        'user_ids' => 'array',
        'course_ids' => 'array',
        'category_ids' => 'array',
        'all_users' => 'boolean',
        'all_courses' => 'boolean',
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];

    const PERCENT_TYPE = 'percent';
    const FIXED_TYPE = 'fixed';

    const DISCOUNT_TYPES = [
        self::PERCENT_TYPE => 'Percentage Discount',
        self::FIXED_TYPE => 'Fixed Discount',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function discountType()
    {
        return self::DISCOUNT_TYPES[$this->discount_type];
    }

    // returns coupon if $code is valid with the $user and $course. Otherwise return null
    public static function getCouponIfValid(?string $code, User $user, Program $course)
    {
        if ($code == null)
            return null;

        /** @var Coupon $coupon */
        $coupon = Coupon::firstWhere('code', $code);

        if ($coupon == null)
            return null;

        if ($coupon->isUserValid($user) and $coupon->isCourseValid($course) and $coupon->isDateValid())
            return $coupon;
        else
            return null;
    }

    // returns id of coupon if $code is valid with the $user and $course. Otherwise return null
    public static function getIdIfValid(?string $code, User $user, Program $course)
    {
        if ($code == null)
            return null;

        /** @var Coupon $coupon */
        $coupon = Coupon::firstWhere('code', $code);

        if ($coupon == null)
            return null;

        if ($coupon->isUserValid($user) and $coupon->isCourseValid($course) and $coupon->isDateValid())
            return $coupon->id;
        else
            return null;
    }

    public function isUserValid(User $user)
    {
        if ($this->all_users or in_array($user->id, $this->user_ids))
            if ($this->hasRemainingUses($user))
                return true;

        return false;
    }

    public function hasRemainingUses(User $user)
    {
        $usageCount = Sale::where('user_id', $user->id)->where('coupon_id', $this->id)->count();
        return $usageCount < $this->usage_limit;
    }

    public function isCourseValid(Program $course)
    {
        if ($this->all_courses or in_array($course->id, $this->course_ids) or $this->categoryIncluded($course))
            return true;

        return false;
    }

    public function categoryIncluded(Program $course)
    {
        $courseCategory = $course->category;
        if ($courseCategory == null)
            return false;
        $parentCategories = $courseCategory->parentsIds(true);
        return count(array_intersect($this->category_ids, $parentCategories)) > 0;
    }

    public function isDateValid()
    {
        return now() > $this->valid_from and now() < $this->valid_to;
    }

    // Applies price on cart and returns price after promo code
    public function applyToCart(Cart $cart)
    {
        $cart->price = $this->applyToPrice($cart->price);
    }

    public function applyToPrice($price)
    {
        $newPrice = 0;

        if ($this->discount_type == self::PERCENT_TYPE)
            $newPrice = $this->applyPercentDiscount($price);
        elseif ($this->discount_type == self::FIXED_TYPE)
            $newPrice = $this->applyFixedDiscount($price);

        return $newPrice;
    }

    public function applyPercentDiscount($price)
    {
        return (1 - ($this->amount) / 100) * $price;
    }

    public function applyFixedDiscount($price)
    {
        $price = $price - $this->amount;
        return ($price < 0) ? 0 : $price;
    }
}
