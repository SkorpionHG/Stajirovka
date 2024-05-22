<?php 

$main_array = ["acdsad", "asfwaf", "asfwfwa", "asfwfwa", "adgaswa", "geawasfeg", "wawfww"];

$array_A = array();
$array_B = array();

$substring = "asf";

foreach ($main_array as $v) {
    if (str_contains($v, $substring)) {
        $array_A[] = $v;
    }
    else {
        $array_B[] = $v;
    }
}
 
echo "массив A: ";

foreach($array_A as $arr) {
    echo $arr . " ";
}

echo "\nмассив B: ";

foreach($array_B as $arr) {
    echo $arr . " ";
}