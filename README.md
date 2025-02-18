# paymentgateway

 General information about this package.

## Installation For laravel 8x, 9x and 10x

### Configure Your Composer.json file to install this package

Add vcs repo to ```composer.json```

````shell
 "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/CiptasolutindoTech/Payment-Gateway.git"
        }
    ],
````

run below command to install this package from your command promt or terminal

````shell

composer require cst/paymentgateway

````

Information about the installation procedure for this package.

## Supported Payment Gateway List

1. PayPal
2. Stripe
3. Midtrans
4. Paystack

### charge_customer method example

```php
$paypal = PaymentGateway::paypal();
$paypal->setClientId('client_id'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setClientSecret('client_secret'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setAppId('app_id'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setCurrency("EUR");
$paypal->setEnv(true); //env must set as boolean, string will not work
$paypal->setExchangeRate(74); // if INR not set as currency

$response =  $paypal->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```

#### ipn_response method example

```php
$paypal = PaymentGateway::paypal();
$paypal->setClientId('AUP7AuZMwJbkee-2OmsSZrU-ID1XUJYE-YB-2JOrxeKV-q9ZJZYmsr-UoKuJn4kwyCv5ak26lrZyb-gb');
$paypal->setClientSecret('EEIxCuVnbgING9EyzcF2q-gpacLneVbngQtJ1mbx-42Lbq-6Uf6PEjgzF7HEayNsI4IFmB9_CZkECc3y');
$paypal->setEnv(true); //env must set as boolean, string will not work
$paypal->setAppId('641651651958');
dd($paypal->ipn_response());

```

### Setup For Stripe

route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

### stripe charge_customer method example

```php
$stripe = PaymentGateway::stripe();
$stripe->setSecretKey('sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw');
$stripe->setPublicKey('pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x');
$stripe->setCurrency("EUR");
$stripe->setEnv(true); //env must set as boolean, string will not work
$stripe->setExchangeRate(74); // if INR not set as currency

$response =  $stripe->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```

#### sripe ipn_response method example

```php
$stripe = PaymentGateway::stripe();
$stripe->setSecretKey('sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw');
$stripe->setPublicKey('pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x');
$stripe->setEnv(true); //env must set as boolean, string will not work
dd($stripe->ipn_response());

```

## Setup For Midtrans

route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

### midtrans charge_customer method example

```php
$midtrans = PaymentGateway::midtrans();
$midtrans->setClientKey('SB-Mid-client-iDuy-jKdZHkLjL_I');
$midtrans->setServerKey('SB-Mid-server-9z5jztsHyYxEdSs7DgkNg2on');
$midtrans->setCurrency("IDR");
$midtrans->setEnv(true); //true mean sandbox mode , false means live mode
$midtrans->setExchangeRate(74); // if IDR not set as currency

$response =  $midtrans->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```

### midtrans ipn_response method example

```php
$midtrans->setClientKey('client_key');
$midtrans->setServerKey('server_key');
$midtrans->setEnv(true); //true mean sandbox mode , false means live mode
dd($midtrans->ipn_response());

```

#### Midtrans ipn route example

````php
Route::get('/midtrans-ipn', [\App\Http\Controllers\PaymentLogController::class,'midtrans_ipn'] )->name('payment.midtrans.ipn');
````

#### Midtrans Test Cards

``` md
VISA                                        Description
4811 1111 1111 1114                         3DS Enabled
4911 1111 1111 1113                         3DS Enabled. Transaction Denied by Bank

4411 1111 1111 1118                         3DS Disabled
4511 1111 1111 1117                         3DS Disabled. Challenged by Fraud Detection
4611 1111 1111 1116                         3DS Disabled. Denied by Fraud Detection
4711 1111 1111 1115                         3DS Disabled. Transaction Denied by Bank

MASTERCARD                                  Description
5211 1111 1111 1117                         3DS Enabled
5111 1111 1111 1118                         3DS Enabled. Transaction Denied by Bank

5410 1111 1111 1116                         3DS Disabled
5510 1111 1111 1115                         3DS Disabled. Challenged by Fraud Detection
5411 1111 1111 1115                         3DS Disabled. Denied by Fraud Detection
5511 1111 1111 1114                         3DS Disabled. Transaction Denied by Bank
```

## Paystack

[Checkout Paystack Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/paystack/)

Here is Test Credentials For Paystack

### Paystack ipn route example

````php
Route::get('/paystack-ipn', [\App\Http\Controllers\PaymentLogController::class,'paystack_ipn'] )->name('payment.paystack.ipn');
````

> Note: paystack does not support multiple ipn route, it supports only one webhook you can add in paystack dashboard. you can use $arg['payment_type'] data for check which kind of payment processed

route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### paystack charge_customer method example

```php

$paystack = PaymentGateway::paystack();
$paystack->setPublicKey('pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9');
$paystack->setSecretKey('sk_test_2a458001d806c878aba51955b962b3c8ed78f04b');
$paystack->setMerchantEmail('sopnilsohan03@gmail.com');
$paystack->setCurrency("EUR");
$paystack->setEnv(true); //env must set as boolean, string will not work
$paystack->setExchangeRate(74); // if NGN not set as currency

$response =  $paystack->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;

```

### paystack ipn_response method example

```php
$paystack = PaymentGateway::paystack();
$paystack->setPublicKey('pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9');
$paystack->setSecretKey('sk_test_2a458001d806c878aba51955b962b3c8ed78f04b');
$paystack->setMerchantEmail('sopnilsohan03@gmail.com');
$paystack->setEnv(true);  //env must set as boolean, string will not work
dd($paystack->ipn_response());

```
