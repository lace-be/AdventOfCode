<?php
$myfile = fopen("input.txt", "r") or die("Unable to open file!");

$numbers = fread($myfile, filesize("input.txt"));

preg_match_all('/mul\(\d+,\d+\)/', $numbers, $numbers);

foreach ($numbers[0] as $key => $value) {
    $numbers[0][$key] = str_replace('mul(', '', $value);
    $numbers[0][$key] = str_replace(')', '', $numbers[0][$key]);
    $numbers[0][$key] = explode(',', $numbers[0][$key]);
    $numbers[0][$key] = $numbers[0][$key][0] * $numbers[0][$key][1];
}

print_r(array_sum($numbers[0]));
?>