<?php

declare(strict_types=1);

session_start();
var_dump($_SESSION);
//session_unset();
//session_destroy();
//die();

$products = [
    [
        'id'          => 'food-1',
        'name'        => 'Paella arroz negra',
        'category'    => 'food',
        'description' => 'Round rice, Chipirón Tomato Sauce, Peeled Shrimp, Ali Olí, Squid Ink, Salt, Dehydrated Fish Broth Olive Oil, Water',
        'price'       => 100.00,
        'image'       => 'paella_arroz_negro.png',
    ],
    [
        'id'          => 'food-2',
        'name'        => 'Paella carne',
        'category'    => 'food',
        'description' => 'Round rice, Chicken, Rabbit, Red pepper, Peas, Tomato sauce Coloring, Salt, Dehydrated meat broth, Water',
        'price'       => 120.00,
        'image'       => 'paella_carne.png',
    ],
    [
        'id'          => 'food-3',
        'name'        => 'Paella de verduras',
        'category'    => 'food',
        'description' => 'Round Rice, Red Pepper, Green Pepper, Artichokes, Flat Green Bean, Garlic, White Bean, Tomato Coloring, Salt, Dehydrated Broth, Olive Oil, Water',
        'price'       => 120.00,
        'image'       => 'paella_de_verduras.png',
    ],
    [
        'id'          => 'food-4',
        'name'        => 'Paella marinera',
        'category'    => 'food',
        'description' => 'Pump Rice, Red Pepper, Green Pepper, Artichokes, Flat Green Bean, Loin, White Bean, Salmorreta (Salsa based on oil, onion, garlic, ñoras), Coloring, Salt, Broth, Olive Oil',
        'price'       => 150.00,
        'image'       => 'paella_marinera.png',
    ],
    [
        'id'          => 'food-5',
        'name'        => 'Paella mixta',
        'category'    => 'food',
        'description' => 'Round Rice, Chicken, Squid. Prawn, Mussel, Red Pepper Peas, Tomato Sauce Coloring, Salt, Dehydrated fish broth, Olive oil, Water',
        'price'       => 140.00,
        'image'       => 'paella_mixta.png',
    ],
    [
        'id'          => 'food-6',
        'name'        => 'Paella valenciana',
        'category'    => 'food',
        'description' => 'Round rice, chicken. Rabbit, Red Pepper, Flat Green Bean Garnet, White Bean, Rosemary Tomato Sauce, Coloring, Salt, Meat Broth, Dehydrated Olive Oil. Water',
        'price'       => 130.00,
        'image'       => 'paella_valenciana.png',
    ],
    [
        'id'          => 'wine-1',
        'name'        => 'Montecillo Rioja Crianza, 2016',
        'category'    => 'drink',
        'description' => 'Fresh berry and red plum aromas are lifted by complementary notes of oak grain and vanilla. Red plum, berry and a hint of wood spice make for a classic Rioja flavor profile, while this remains tasty and fresh on the finish.',
        'price'       => 10.00,
        'image'       => 'montecillo_rioja_crianza.webp',
    ],
    [
        'id'          => 'wine-2',
        'name'        => 'Drama Red Blend, 2017',
        'category'    => 'drink',
        'description' => 'Summer nights, a cheese plate and your favorite song on the patio all pair beautifully with this scrumptious Spanish blend of Tempranillo and Garnacha. For the price, why not buy two? Keep one and then share this highly rated gem with a friend so they can enjoy their night too!',
        'price'       => 12.00,
        'image'       => 'drama_red_blend.webp',
    ],
    [
        'id'          => 'wine-3',
        'name'        => 'Palma Real Rueda Verdejo',
        'category'    => 'drink',
        'description' => 'One of the most exciting new whites from Spain, this 100% Verdejo is crisp and dry with intriguing floral, citrus and mineral aromas and flavors. Fabulous complexity in an unoaked wine at this price! Enjoy with grilled seafood or lighter fare.',
        'price'       => 10.00,
        'image'       => 'palma_real_rueda_verdejo.webp',
    ],
    [
        'id'          => 'wine-4',
        'name'        => 'Almodi Terra Alta Petit White',
        'category'    => 'drink',
        'description' => 'Dry in style with note sof citrus. The mouth is round with a good acidity level that adds freshness to the wine. Pairs wonderfully with halibut, hummus and creamy cheeses.',
        'price'       => 12.00,
        'image'       => 'almodi_terra_alta_petit_white.webp',
    ],
    [
        'id'          => 'wine-5',
        'name'        => 'HoM Rose',
        'category'    => 'drink',
        'description' => 'Made from 100% organically grown Grenache. Robert Eden crafts this Rose from a 22 year-old vineyard in Baja Monatana, a small region in Navarra. With aromas of wildflowers and crisp flavors of raspberry and strawberry on the palate this Rose is sure to please.',
        'price'       => 15.00,
        'image'       => 'hom_rose.webp',
    ],
    [
        'id'          => 'wine-6',
        'name'        => 'Chopo Jumilla Monastrell Rose',
        'category'    => 'drink',
        'description' => 'This is a dry style Rose has bright pleasant fruit flavors accompanied by a floral bouquet. This wine has a vibrant raspberry color and a balanced palate. Enjoy this lovely Rose on a warm Summer evening.',
        'price'       => 20.00,
        'image'       => 'chopo_jumilla_monastrell_rose.webp',
    ],
];
//print_r($products);

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

$imagePath = 'assets/images/products/';

// TODO: make validation function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);

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
            $emailError = $errorPrefix . $errorMailText . $errorSuffix;
        } else {
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
        $orderAmount = calculateOrderAmount($products, $_POST['product']);
        echo 'Order amount: ' . $orderAmount . '<br />';
        storeOrderAmount($orderAmount);

        // ADD FIELDS TO SESSION
        $_SESSION["email"]          = $email;
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

// TODO: remove function to general file
function filterProducts1($products, $filter)
{
    $test = array_filter($products, function ($var) use ($filter) {
        return ($var['id'] == $filter);
    });
    return $test;
}

function calculateOrderAmount($products, $orderedProducts)
{
    $total = 0;
    foreach ($orderedProducts as $orderedProduct) {
        $filteredProducts = filterProducts1($products, $orderedProduct);
        foreach ($filteredProducts as $filteredProduct) {
            $total += $filteredProduct['price'];
        }
    }
    return $total;
}

function storeOrderAmount($orderAmount)
{
    if (!isset($_SESSION['order-amount-total'])) {
        $_SESSION['order-amount-total'] = 0;
        $_SESSION['order-amount-total'] = $orderAmount;
    } else {
        $_SESSION['order-amount-total'] += $orderAmount;
    }
}

require('includes/view_form.php');