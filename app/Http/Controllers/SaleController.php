<?php

namespace App\Http\Controllers;

use App\Mail\NotifySale;
use App\Mail\SaleSuccessful;
use App\Models\Cart;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SaleController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }


    


    // Client Callback
    public function returnResponse()
    {
        abort_if(!$this->is_genuine(request()), Response::HTTP_FORBIDDEN);

        /** @var Cart cart */
        $cart = Cart::findOrFail(request('cartId'));
        auth()->loginUsingId($cart->id);

        if (request('respStatus') == 'A') {
            return redirect()->route('home')->with([
                'flash' => 'success',
                'message' => trans('sales.successful'),
            ]);
        } else if (request('respStatus') == 'C') {
            $cart = Cart::findOrFail(request('cartId'));
            return redirect()->route('programs.show', $cart->program);
        } else {
            return redirect()->route('home')->with([
                'flash' => 'error',
                'message' => trans('sales.error'),
            ]);
        }
    }

    // Server callback
    public function callbackResponse()
    {
        // just for now, check if genuine later
        abort_if(request('profile_id') != config('paytabs.profile_id'), Response::HTTP_FORBIDDEN);

        $cart = Cart::findOrFail(request('cart_id'));

        Log::channel('daily')->debug($cart);

        if (request('payment_result.response_status') == 'A') {
            Mail::to('mohamed.hamouda@nafess.com')->send(new NotifySale($cart->getUser(), $cart->program));
            Mail::to('info@izonlineedu.com')->send(new NotifySale($cart->getUser(), $cart->program));
            Mail::to('magedamin@izonlineedu.com')->send(new NotifySale($cart->getUser(), $cart->program));
            Mail::to($cart->getUser())->send(new SaleSuccessful($cart->getUser(), $cart->program));

            Sale::create([
                'user_id' => $cart->id,
                'program_id' => $cart->program_id,
                'coupon_id' => $cart->coupon_id,
                'ref_no' => request('tran_ref'),
                'amount' => $cart->price,
            ]);
        }
    }

    function is_genuine(Request $request)
    {
        $payload = http_build_query($request->except('signature'));
        $requestSignature = $request['signature'];
        $serverKey = config('paytabs.server_key');

        $signature = hash_hmac('sha256', $payload, $serverKey);

        if (hash_equals($signature, $requestSignature) === TRUE) {
            // VALID Redirect
            return true;
        } else {
            // INVALID Redirect
            return false;
        }
    }
}
