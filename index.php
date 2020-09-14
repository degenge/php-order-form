<?php
// TODO: Add Tailwind without CDN
// TODO Add ALpinjs to js
// TODO: Add number field to products
// TODO: Style the add to cart button
// TODO: Total amount gives error when cache is cleared
// TODO: Check why Carbon isn't working
// TODO: ADD express delivery
// TODO: Lookup product ID in array and return text for mail

declare(strict_types=1);

session_start();
//var_dump($_SESSION);
//session_unset();
//session_destroy();
//die();

// Load Composer's autoloader
require 'vendor/autoload.php';

use Carbon\Carbon;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require('product.php');
require('Mailer.php');

$nameFirst = $nameLast = $email = "";

$addressStreet = (isset($_SESSION["address-street"])) ? $_SESSION['address-street'] : '';
$addressNumber = (isset($_SESSION["address-number"])) ? $_SESSION['address-number'] : '';
$addressZip    = (isset($_SESSION["address-zip"])) ? $_SESSION['address-zip'] : '';
$addressCity   = (isset($_SESSION["address-city"])) ? $_SESSION['address-city'] : '';

$nameFirstError = $nameLastError = $emailError = $addressStreetError = $addressNumberError = $addressZipError = $addressCityError = $productError = "";

$errorPrefix              = '<p class="text-red-500 text-xs italic" >';
$errorSuffix              = '</p >';
$errorRequiredText        = 'Please fill out this field.';
$errorRequiredProductText = 'Please select a product to order.';
$errorMailText            = 'Wrong mail format.';
$isFormValid              = true;

$imagePath = 'assets/images/products/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //var_dump($_POST);

    if (!empty($_POST['name-first'])) {
        $nameFirst = sanitizeData($_POST['name-first']);
    } else {
        $isFormValid    = false;
        $nameFirstError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['name-last'])) {
        $nameLast = sanitizeData($_POST['name-last']);
    } else {
        $isFormValid   = false;
        $nameLastError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['email'])) {
        // CHECK IF EMAIL IS VALID
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isFormValid = false;
            $emailError  = $errorPrefix . $errorMailText . $errorSuffix;
        }
    } else {
        $isFormValid = false;
        $emailError  = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['address-street'])) {
        $addressStreet = sanitizeData($_POST['address-street']);
    } else {
        $isFormValid        = false;
        $addressStreetError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['address-number'])) {
        $addressNumber = sanitizeData($_POST['address-number']);
    } else {
        $isFormValid        = false;
        $addressNumberError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['address-zip'])) {
        $addressZip = sanitizeData($_POST['address-zip']);
    } else {
        $isFormValid     = false;
        $addressZipError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['address-city'])) {
        $addressCity = sanitizeData($_POST['address-city']);
    } else {
        $isFormValid      = false;
        $addressCityError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }


    if (!empty($_POST['product'])) {
        $orderedProducts = $_POST['product'];
    } else {
        $isFormValid  = false;
        $productError = $errorPrefix . $errorRequiredProductText . $errorSuffix;
    }

    if ($isFormValid) {
        //echo 'Name first: ' . $nameFirst . '<br />';
        //echo 'Name last: ' . $nameLast . '<br />';
        //echo 'Email: ' . $email . '<br />';
        //echo 'Address street: ' . $addressStreet . '<br />';
        //echo 'Address number: ' . $addressNumber . '<br />';
        //echo 'Address zip: ' . $addressZip . '<br />';
        //echo 'Address city: ' . $addressCity . '<br />';
        $orderAmount = calculateOrderAmount($products, $orderedProducts);
        //echo 'Order amount: ' . $orderAmount . '<br />';
        storeOrderAmount($orderAmount);

        // ADD FIELDS TO SESSION
        $_SESSION["address-street"] = $addressStreet;
        $_SESSION["address-number"] = $addressNumber;
        $_SESSION["address-zip"]    = $addressZip;
        $_SESSION["address-city"]   = $addressCity;

        // PHP Version
        //$date                = new DateTime("now", new DateTimeZone('Europe/Brussels'));
        //$timeNormalDelivery  = date("H:i", strtotime('+2 hours', strtotime($date->format('H:i'))));
        //$timeExpressDelivery = date("H:i", strtotime('+45 minutes', strtotime($date->format('H:i'))));
        // CARBON Version
        $timeNormalDelivery  = Carbon::now(new DateTimeZone('Europe/Brussels'))->addHours(2)->format('H:i');
        $timeExpressDelivery = Carbon::now(new DateTimeZone('Europe/Brussels'))->addMinutes(45)->format('H:i');
        $timeDelivery        = $timeNormalDelivery;

        $productsText = '';
        foreach ($orderedProducts as $orderedProduct) {
            $productsText .= $orderedProduct . '<br />';
        }
        $productsText1 = createOrderTable($products, $orderedProducts);

        $bodyText = '<p>Hello, </p>';
        $bodyText .= '<p>You ordered the following at The paella shop:</p><p>' . $productsText1 . '</p>';
        $bodyText .= '<p>The order address is ' . $addressStreet . ' ' . $addressNumber . ', ' . $addressZip . ' ' . $addressCity . '</p>';
        $bodyText .= '<p>Your order wil be ready at <strong>' . $timeDelivery . '</strong> . The total amount is <strong>' . $orderAmount . 'eur</strong></p>';
        $bodyText .= '<p>Thanks for your order.</p>';
        $bodyText .= '<p>The paella shop</p>';


        //SEND MAIL
        $mailArray = [
            'toAddress' => 'gerrit.degenhardt@telenet.be',
            'toName'    => 'Degenhardt Gerrit',
            'subject'   => 'Your order from The paella shop.',
            'body'      => $bodyText,
        ];

        try {
            $mail = new Mailer(true, $mailArray);
            $mail->send();
        } catch (Exception $e) {
            //Note that this is catching the PHPMailer Exception class, not the global \Exception type!
            echo 'Caught a ' . get_class($e) . ': ' . $e->getMessage();
        }

        // RESET FORM FIELDS
        $nameFirst = $nameLast = $email = $addressStreet = $addressNumber = $addressZip = $addressCity = "";
    }

}

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require('includes/view_form.php');