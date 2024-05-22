<?php

$products = array(
    "A201" => 6, "A202" => 4, "A203" => 15, "A204" => 4, "A205" => 10, 
    "A206" => 6, "A207" => 4, "A208" => 6, "A209" => 15, "B201" => 8,
    "B202" => 8, "B203" => 10, "B204" => 2, "B205" => 7, "B206" => 10,
    "B207" => 2, "B208" => 4, "B209" => 6, "C201" => 8, "C202" => 15,
    "C203" => 5, "C204" => 9, "C205" => 14, "C206" => 3, "C207" => 7);

function countPairs($array) {
    $group = [];
    $pairCount = 0;

    foreach ($array as $value) {
        if (array_key_exists($value, $group)) {
            $group[$value]++;
        } 
        else {
            $group[$value] = 1;
        }
    }
    unset($value);

    foreach ($group as $key => $value) {
        if ($value > 1) {
            $pairCount += ($value * ($value - 1)) / 2;
        }
    }

    return $pairCount;
}

echo "Количество пар товаров: " . countPairs($products);