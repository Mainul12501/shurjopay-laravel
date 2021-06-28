# ShurjoPay-Laravel 💳

> A package for handling ShurjoPay payment gateway in Laravel applications

Laravel-ShurjoPay is a package for handling ShurjoPay payment gateway easily in Laravel applications. It has some advantages over the package provided by ShurjoPay and is much more configurable and well-structured.

##### Key differences with the official package

- Auto discovery for Laravel 5.5+ projects. 🔍
- Uses **Guzzle** instead of cURL by default.

#### Requirements

- PHP >= 7.2
- Laravel >= 6.0

Installation
---

To install the package run

```
composer require mainul/shurjopay-laravel
```

Publish
---

To publish the config file, run the following command

```
php artisan vendor:publish --tag=ma-config
```

Environment Variables (Optional)
---

ShurjoPay would provide you some credentials, define them in your `.env` file:

```dotenv
SHURJOPAY_SERVER_URL=
MERCHANT_USERNAME=
MERCHANT_PASSWORD=
MERCHANT_KEY_PREFIX=
```


Usage
---

The usage of the package is simple. First import the `mainul\ShurjoPay\ShurjoPayService` class.

```php
use mainul\ShurjoPay\ShurjoPayService;
```
Now add this line of code in your method where you want to call shurjoPay Payment Gateway. You can use any code segment of below

```php
$shurjopay = new ShurjopayService();
$tx_id = $shurjopay->generateTxId();
$success_route = route('Your route'); //This is your custom route where you want to back after completing the transaction.
$data= [
	'amount'=>$request->total_amount, // Your order total amount
	'custom1'=>$request->user_name, // Custom data like User Name
	'custom2'=>$request->email, // Custom data like User Email
	'custom3'=>$request->phone, // Custom data like User Phone Number
	'custom4'=>$request->address, // Custom data like user address
	'is_emi'=>0 //0 No EMI 1 EMI active
];
$shurjopay->sendPayment($data, $success_route);
```

...and call the `generateTxnId()` and `sendPayment()` method.

```php
$shurjopay->generateTxnId(); // Pass any string to set your own unique id
$shurjopay->makePayment();
```

That's it! After successful or failed attempt it will redirect to the route you provided along with ShurjoPay response parameters.

Note: if you are using laravel version <8.x, then you may get this error ```route('shurjopay.response') not define.``` 
To fix this issue, just copt this route in your ```routes/api.php``` file.
```Route::post('/response', 'mainul\Shurjopay\ShurjopayController@response')->name('shurjopay.response');```

Now Test your application and oversees the response and interaction.
