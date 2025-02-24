<?php

namespace Cst\PaymentGateway\Facades;

use Illuminate\Support\Facades\Facade;
use Cst\PaymentGateway\Base\PaymentGatewayHelpers;
/**
 * @see Cst\PaymentGateway\Base\GlobalCurrency
 * @method static script_currency_list()
 *
 * @method static PaymentGatewayHelpers stripe()
 * @method static PaymentGatewayHelpers paypal()
 * @method static PaymentGatewayHelpers midtrans()
 * @method static PaymentGatewayHelpers paystack()
 * @see PaymentGatewayHelpers
 * @see Cst\PaymentGateway\Base\Gateways\MidtransPay
 * @see Cst\PaymentGateway\Base\Gateways\PaypalPay
 * @see Cst\PaymentGateway\Base\Gateways\PaystackPay
 * @see Cst\PaymentGateway\Base\Gateways\StripePay
 *
 */
class PaymentGateway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'PaymentGateway';
    }
}
