<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Program;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->user()?->can('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', 'string', 'max:255', Rule::unique(Coupon::class)],
            'discount_type' => ['required', 'string', Rule::in(array_keys(Coupon::DISCOUNT_TYPES))],

            'description' => ['string'],

            'amount' => ['required', 'numeric', 'min:1'],

            'user_ids' => ['array'],
            'user_ids.*' => ['distinct', Rule::exists(User::class, 'id')],
            'course_ids' => ['array'],
            'course_ids.*' => ['distinct', Rule::exists(Program::class, 'id')],
            'category_ids' => ['array'],
            'category_ids.*' => ['distinct', Rule::exists(Category::class, 'id')],

            'all_users' => ['boolean'],
            'all_courses' => ['boolean'],

            'usage_limit' => ['nullable', 'sometimes', 'numeric', 'min:0'],

            'valid_from' => ['date'],
            'valid_to' => ['date'],
        ];
    }

    public function forCoupon()
    {
        return collect($this->validated())->only([
            'code', 'discount_type', 'description',
            'amount', 'user_ids', 'course_ids',
            'category_ids', 'all_users', 'all_courses',
            'usage_limit', 'valid_from', 'valid_to',
        ])->toArray();
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // add conditional validation to amount, incase type is percent
        $validator->sometimes('amount', ['max:100'], function ($request) {
            return $request->discount_type == Coupon::PERCENT_TYPE;
        });

        // add before or equal if valid_to is not null
        $validator->sometimes('valid_from', 'before_or_equal:valid_to', function ($request) {
            return $request->valid_to != null;
        });

        $validator->sometimes('valid_to', 'after_or_equal:valid_from', function ($request) {
            return $request->valid_from != null;
        });
    }
}
