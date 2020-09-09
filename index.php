<?php

declare(strict_types=1);

session_start();

// TODO: make validation function
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nameFirst = isset($_POST['name-first']) ? $_POST['name-first'] : '';

//if (!empty($_POST)) {
    print_r($_POST);

    if (!empty($_POST['email'])) {
        echo 'valid';
//        if ($emailFormat) {
//            echo 'email format ok';
//        } else {
//            echo 'mail format not ok';
//        }
    } else {
        // TODO: show error
        echo 'not valid';
    }

}
$products = [
    [
        'name' => 'cl'
    ],
];

$totalValue = 0;

require('includes/view_form.php');