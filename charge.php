<?php

include ('vendor/autoload.php');

if (!isset($_POST['price'])) {
  header('location: index.php');
}
$price = $_POST['price'];
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_51Hh6ZIL6hSzqOO7QJxTK0AyXU2W8SP1V8nZqFuiExmCfYDlGyzV14aPYNqGefhTqzmeGhpvbp0yYseZCrIIWG8HM00LpfYIBB9');

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
  'amount' => $price."00",
  'currency' => 'inr',
  'description' => 'Example charge',
  'source' => $token,
]);

if (isset($charge)) {
    header("Location: thank-you.php");
    exit;
}