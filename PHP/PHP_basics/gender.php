<?php

$alphas = range('a', 'z');

$name = "";
$namelength = rand(10, 100);

for ($i = 1; $i <= $namelength; $i++) {
    $name .= $alphas[rand(0, count($alphas) - 1)];
}

if(strlen($name) % 2 == 0) {
    echo "Girl!";
}
else {
    echo "Boy!";
}

echo "<pre>";
print_r($alphas);
echo "</pre>";