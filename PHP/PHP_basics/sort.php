<?php

$array = array(30);

for($i = 0; $i < rand(20, 100); $i++) {
    array_push($array, rand(1, 100));
}

function MergeSort($array) {
    
}

echo "<pre>";
print_r($array);
echo "</pre>";