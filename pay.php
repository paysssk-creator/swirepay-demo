<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_live_51QNFK2LM6tXnTUcN4j5w8fXg7HLsTOpPvMa2RnK1mNO9xAyQqE8r3tYy5zU6vP1w2iJ9kLOn');

header('Content-Type: application/json');
$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['us_bank_account'],
  'mode' => 'payment',
  'amount' => 5000, // 50 USD
  'currency' => 'usd',
  'success_url' => 'https://paysssk-creator.github.io/swirepay-demo/success.html',
  'cancel_url'  => 'https://paysssk-creator.github.io/swirepay-demo/cancel.html',
]);
echo json_encode(['id' => $session->id]);
?>
