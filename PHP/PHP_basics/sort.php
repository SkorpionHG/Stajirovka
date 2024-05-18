<?php

$array = [3,6,2,7,15,8,11,6,7,2,6,2,8,22,13];

function MergeSort($arr) {
    if (count($arr) > 1)  {
        $arr_left = array_slice($arr, 0, intdiv(count($arr), 2));
        $arr_right = array_slice($arr, intdiv(count($arr), 2));

        MergeSort($arr_left);
        MergeSort($arr_right);
    }
    $i = 0;
        $j = 0;
        $k = 0;

        while($i < count($arr_left) && $j < count($arr_right)) {
            if ($arr_left[$i] < $arr_right[$j]) {
                $arr[$k] = $arr_left[$i];
                $i += 1;
            }
            else {
                $arr[$k] = $arr_right[$j];
                $j += 1;
            }
            $k += 1;
        }

        while($i < count($arr_left)) {
            $arr[$k] = $arr_left[$i];
            $i += 1;
            $k += 1;
        }

        while($j < count($arr_right)) {
            $arr[$k] = $arr_right[$j];
            $j += 1;
            $k += 1;
        }
    return $arr;
}

echo "<pre>";
print_r(MergeSort($array));
echo "</pre>";