<?php

declare(strict_types=1);

session_start();
var_dump($_SESSION);
//session_unset();
//session_destroy();
//die();

require('product.php');

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
        echo 'Name first: ' . $nameFirst . '<br />';
        echo 'Name last: ' . $nameLast . '<br />';
        echo 'Email: ' . $email . '<br />';
        echo 'Address street: ' . $addressStreet . '<br />';
        echo 'Address number: ' . $addressNumber . '<br />';
        echo 'Address zip: ' . $addressZip . '<br />';
        echo 'Address city: ' . $addressCity . '<br />';
        $orderAmount = calculateOrderAmount($products, $orderedProducts);
        echo 'Order amount: ' . $orderAmount . '<br />';
        storeOrderAmount($orderAmount);

        // ADD FIELDS TO SESSION
        $_SESSION["address-street"] = $addressStreet;
        $_SESSION["address-number"] = $addressNumber;
        $_SESSION["address-zip"]    = $addressZip;
        $_SESSION["address-city"]   = $addressCity;

        //SEND MAIL
        //mail('gerrit.degenhardt@telenet.be', 'My Subject', 'blablabla');

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