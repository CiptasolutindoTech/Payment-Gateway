<?php

namespace Cst\PaymentGateway\Base;

use Cst\PaymentGateway\Base\Gateways\MidtransPay;
use Cst\PaymentGateway\Base\Gateways\PaypalPay;
use Cst\PaymentGateway\Base\Gateways\PaystackPay;
use Cst\PaymentGateway\Base\Gateways\StripePay;


/**
 * @see SquarePay
 * @method  setApplicationId();
 * @method  setAccessToken();
 * @method  setLocationId();
 */

class PaymentGatewayHelpers
{

    public function stripe() : StripePay
    {
        return new StripePay();
    }
    public function paypal() : PaypalPay
    {
        return new PaypalPay();
    }
    public function midtrans() : MidtransPay
    {
        return new MidtransPay();
    }
    public function all_payment_gateway_list() : array
    {
        return [
            'paystack','midtrans','paypal','stripe'
        ];
    }
    public function script_currency_list(){
        return GlobalCurrency::script_currency_list();
    }

    public static function wrapped_id($id) : string
    {
        return random_int(11111,99999).$id.random_int(11111,99999);
    }
    public static function unwrapped_id($id) : string
    {
        return substr($id,5,-5);
    }
    public static function get_current_file_url($Protocol='http://') {
        return $Protocol.$_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__));
    }
}
