<?php

$transactions = [100, -600, 400, 250, -100, 200, -250, 330, -420, 140, 50];

function MaxBalance($transactions) {
    $max = 0;
    $sum = 0;

    for ($i = 0; $i < count($transactions); $i++) {
        $sum += $transactions[$i];
        if ($sum > $max) {
            $max = $sum;
        }
        if ($sum < 0) {
            $sum = 0;
        }
    }

    return $max;
}

echo "Максимальный баланс: ". MaxBalance($transactions);