<?php

namespace Cst\PaymentGateway\Facades;

use Illuminate\Support\Facades\Facade;
use Cst\PaymentGateway\Base\PaymentGatewayHelpers;
/**
 * @see GlobalCurrency
 * @method static script_currency_list()
 *
 * @see PaymentGatewayHelpers
 * @method static stripe()
 * @method static paypal()
 * @method static midtrans()
 * @method static paystack()

 *
 */
class PaymentGateway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'CstPaymentGateway';
    }
}
