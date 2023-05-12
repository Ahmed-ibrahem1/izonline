<?php

namespace App\Http\Livewire\Program;

use App\Models\Coupon;
use App\Models\Program;
use Livewire\Component;

class ShowPrice extends Component
{
    // number of retries before user can't enter anymore coupons
    private $MAX_RETRIES = 5;

    public $retries = 0;
    public $program;
    public $couponCode = '';
    public $couponDisabled = false;
    public $show = false;
    public $alert = '';
    public $alertStatus = '';
    public $disabled = false;
    public $discountPrice = 0;


    public function render()
    {
        $this->disabled = $this->retries >= $this->MAX_RETRIES;
        return view('livewire.program.show-price');
    }

    public function checkCoupon()
    {
        if ($this->disabled)
            return;

        if (!auth()->check()) {
            $this->setAlert('danger', trans('show-program.must-be-signed-in'));
            $this->disableInput();
            return;
        }

        $this->retries++;

        /** @var \App\Models\User user */
        $user = auth()->user();

        /** @var Coupon $coupon */
        $coupon = Coupon::getCouponIfValid($this->couponCode, $user, $this->program);

        if ($coupon) {
            $this->setAlert('success', trans('show-program.coupon-success'));
            $newPrice = $coupon->applyToPrice($this->program->priceEGP()) / Program::getCurrencyRate();
            $this->discountPrice = number_format($newPrice, 1);
            $this->disableInput();
        } else {
            $this->setAlert('danger', trans('show-program.coupon-error'));
        }
    }

    private function disableInput()
    {
        $this->retries = $this->MAX_RETRIES;
    }

    private function setAlert($status, $message)
    {
        $this->alert = $message;
        $this->alertStatus = $status;
    }
}
