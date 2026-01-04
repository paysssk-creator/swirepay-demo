<?php
require 'vendor/autoload.php';   // 若没装 Stripe SDK 先 composer require stripe/stripe-php
\Stripe\Stripe::setApiKey('sk_live_51QNfK2LM6tXnTUcN4j5w8fXg7Hq9LsT0pPvMa2RnKlmNO9xAyQqE8r3tYy5zU6vP1w2iJ9kL0n');

header('Content-Type: application/json');

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['us_bank_account'], // 只开 ACH
  'mode' => 'payment',
  'amount' => 5000,      // 50 USD（单位：分）
  'currency' => 'usd',
  'success_url' => 'https://yourdomain.com/success.html',
  'cancel_url'  => 'https://yourdomain.com/cancel.html',
]);

echo json_encode(['id' => $session->id]);
?>
