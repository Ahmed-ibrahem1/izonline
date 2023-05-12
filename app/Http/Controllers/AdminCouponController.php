<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupons.index', [
            'coupons' => Coupon::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create', [
            'discountTypes' => Coupon::DISCOUNT_TYPES,
            'users' => User::select(['id', 'email'])->where('role_id', Role::CUSTOMER_CODE)->get()->pluck('email', 'id'),
            'courses' => Program::select(['id', 'title'])->get()->pluck('title', 'id'),
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        // Wrap in transaction to avoid db inconsistencies
        return DB::transaction(function () use ($request) {
            $coupon = Coupon::create($request->forCoupon());

            // if ($request->has('user_ids'))
            // Attach users to coupon
            // $coupon->users()->attach($request->safe()['user_ids'], ['remaining_uses' => $request->usage_limit]);
            // $coupon->users()->attach($request->safe()['user_ids']);

            return redirect()->route('admin.coupons.edit', $coupon)->with([
                'flash' => 'success',
                'message' => 'Created Coupon Successfully'
            ]);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', [
            'coupon' => $coupon,
            'discountTypes' => Coupon::DISCOUNT_TYPES,
            'users' => User::select(['id', 'email'])->where('role_id', Role::CUSTOMER_CODE)->get()->pluck('email', 'id'),
            'courses' => Program::select(['id', 'title'])->get()->pluck('title', 'id'),
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponRequest   $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        // Wrap in transaction to avoid db inconsistencies
        return DB::transaction(function () use ($request, $coupon) {
            $coupon->update($request->forCoupon());

            // $user_ids = $request->get('user_ids', []);
            // $coupon->users()->sync($user_ids);

            // loop on user ids, and sync with old 'remaining_uses' values, if exists. Otherwise put usage_limit
            // $coupon->users()->sync(
            //     collect($user_ids)
            //         ->mapWithKeys(
            //             function ($user_id) use ($coupon) {
            //                 return [
            //                     $user_id => [
            //                         'remaining_uses' => $coupon->users()->wherePivot('user_id', $user_id)->first()?->pivot->remaining_uses ?? $coupon->usage_limit,
            //                     ],
            //                 ];
            //             }
            //         )->toArray()
            // );


            return redirect()->route('admin.coupons.edit', $coupon)->with([
                'flash' => 'success',
                'message' => 'Updated Coupon Successfully'
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        // Wrap in transaction to avoid db inconsistencies
        return DB::transaction(function () use ($coupon) {
            // need to detach users first
            // $coupon->users()->detach();

            $coupon->delete();

            return redirect()->route('admin.coupons.index')->with([
                'flash' => 'success',
                'message' => 'Deleted Coupon Successfully'
            ]);
        });
    }
}
