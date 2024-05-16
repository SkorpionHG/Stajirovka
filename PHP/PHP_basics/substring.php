<?php 

$main_array = ["acdsad", "asfwaf", "asfwfwa", "asfwfwa", "adgaswa", "geawasfeg", "wawfww"];

$array_A = array();
$array_B = array();

$substring = "asf";

foreach ($main_array as $v) {
    if (str_contains($v, $substring)) {
        array_push($array_A, $v);
    }
    else {
        array_push($array_B, $v);
    }
}
unset($v);
 
echo "<pre>";
print_r($array_A);
print_r($array_B);
echo "</pre>";