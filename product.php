<?php

if (isset($_POST['filterCategory'])) {

    $mappedForecast = $_POST['filterCategory'];

    $chartData = [
        'legend' => [],
        'data'   => [],
    ];

    foreach ($mappedForecast as $item) {
        array_push($chartData['legend'], $item['dateDayMonth']);
        array_push($chartData['data'], $item['temperatureCurrent']);
    }

    echo json_encode($chartData);

}