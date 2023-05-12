<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'program_id' => [Rule::exists('programs', 'id')],
            'promocode' => ['nullable', 'string', 'max:255'],
        ]);


        /** @var Program program */
        $program = Program::find($attr['program_id']);

        /** @var User user */
        $user = auth()->user();
        $cart = $user->getCart();

        $cart->update([
            'program_id' => $program->id,
            'price' => $program->priceEGP(),
            'coupon_id' => isset($attr['promocode']) ? Coupon::getIdIfValid($attr['promocode'], $user, $program) : null,
        ]);

        $cart->applyCoupon();
        $cart->save();

        Log::channel('Paytabs')->info($cart);

        // start buffer to absorb print_r incase of error
        ob_start();
        $pay = paypage::sendPaymentCode('all')
            ->sendTransaction('sale')
            ->sendCart($cart->id, $cart->price, $program->getTranslation('title', 'en'))
            ->sendLanguage(app()->getLocale())
            ->sendHideShipping(true)
            ->sendURLs(route('sales.return-resp'), route('sales.callback-resp'))
            ->create_pay_page();
        ob_end_clean();

        // if $pay is null, an error occured
        if ($pay == null)
            return redirect()->back()->with([
                'flash' => 'warning',
                'message' => 'Please try again',
            ]);

        return $pay;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
