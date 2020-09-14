<?php

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

function filterProducts($products, $filter, $value)
{
    $test = array_filter($products, function ($var) use ($filter, $value) {
        return ($var[$filter] == $value);
    });
    return $test;
}

function calculateOrderAmount($products, $orderedProducts)
{
    $total = 0;
    foreach ($orderedProducts as $orderedProduct) {
        $filteredProducts = filterProducts($products, 'id', $orderedProduct);
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

function createOrderTable($products, $orderedProducts)
{
    $total = 0;
    $table = '';
    $table .= '<table>';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>ID</th><th>Description</th><th>Price</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    foreach ($orderedProducts as $orderedProduct) {
        $filteredProducts = filterProducts($products, 'id', $orderedProduct);
        foreach ($filteredProducts as $filteredProduct) {
            $table .= '<tr>';
            $table .= '<td>' . $filteredProduct['id'] . '</td><td>' . $filteredProduct['name'] . '</td><td>' . $filteredProduct['price'] . '</td>';
            $table .= '</tr>';
            $total += $filteredProduct['price'];
        }
    }
    $table .= '<tfooter>';
    $table .= '<tr>';
    $table .= '<td></td><td></td><td>' . $total . '</td>';
    $table .= '</tr>';
    $table .= '<tfooter>';

    return $table;
}