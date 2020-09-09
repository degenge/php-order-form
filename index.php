<?php

declare(strict_types=1);

session_start();
var_dump($_SESSION);

$totalValue = 0;

$nameFirst = $nameLast = "";

$email         = (isset($_SESSION["email"])) ? $_SESSION['email'] : '';
$addressStreet = (isset($_SESSION["address-street"])) ? $_SESSION['address-street'] : '';
$addressNumber = (isset($_SESSION["address-number"])) ? $_SESSION['address-number'] : '';
$addressZip    = (isset($_SESSION["address-zip"])) ? $_SESSION['address-zip'] : '';
$addressCity   = (isset($_SESSION["address-city"])) ? $_SESSION['address-city'] : '';

$nameFirstError = $nameLastError = $emailError = $addressStreetError = $addressNumberError = $addressZipError = $addressCityError = "";

$errorPrefix       = '<p class="text-red-500 text-xs italic" >';
$errorSuffix       = '</p >';
$errorRequiredText = 'Please fill out this field.';
$errorMailText     = 'Wrong mail format.';
$isFormValid       = true;

// TODO: make validation function
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    function sanitizeData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError  = $errorPrefix . $errorMailText . $errorSuffix;
        }
        else {
            $email = $_POST['email'];
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

    if ($isFormValid) {
        echo 'Name first: ' . $nameFirst . '<br />';
        echo 'Name last: ' . $nameLast . '<br />';
        echo 'Email: ' . $email . '<br />';
        echo 'Address street: ' . $addressStreet . '<br />';
        echo 'Address number: ' . $addressNumber . '<br />';
        echo 'Address zip: ' . $addressZip . '<br />';
        echo 'Address city: ' . $addressCity . '<br />';

        // ADD FIELDS TO SESSION
        $_SESSION["email"]          = $email;
        $_SESSION["address-street"] = $addressStreet;
        $_SESSION["address-number"] = $addressNumber;
        $_SESSION["address-zip"]    = $addressZip;
        $_SESSION["address-city"]   = $addressCity;

        // RESET FORM FIELDS
        $nameFirst = $nameLast = $email = $addressStreet = $addressNumber = $addressZip = $addressCity = "";
    }

}
$products = [
    [
        'name' => 'cl'
    ],
];


require('includes/view_form.php');