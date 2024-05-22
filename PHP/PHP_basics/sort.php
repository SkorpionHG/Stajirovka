<?php

$array = [];

for ($i = 0; $i < rand(20, 100); $i++) {
    $array[] = rand(1, 1000);
}

function mergeSort($array) {
    $length = count($array);

    if ($length < 2) {
        return $array;
    }

    $middle = intdiv($length, 2);
    $left_arr = array_slice($array, 0, $middle);
    $right_arr = array_slice($array, $middle);

    $left_arr = mergeSort($left_arr);
    $right_arr = mergeSort($right_arr);

    return merge($left_arr, $right_arr);
}

function merge($left, $right) {
    $result = [];
    $leftLength = count($left);
    $rightLength = count($right);

    $i = 0;
    $j = 0;

    while ($i < $leftLength && $j < $rightLength) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    while ($i < $leftLength) {
        $result[] = $left[$i];
        $i++;
    }

    while ($j < $rightLength) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

$array = mergeSort($array);

echo "<pre>";
print_r($array);
echo "</pre>";