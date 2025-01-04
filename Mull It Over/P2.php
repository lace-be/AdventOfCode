<?php
$myfile = fopen("input.txt", "r") or die("Unable to open file!");

$numbers = fread($myfile, filesize("input.txt"));

preg_match_all('/mul\(\d+,\d+\)|do\(\)|don\'t\(\)/', $numbers, $numbers);

$do = true;

foreach ($numbers[0] as $key => $value) {
    if (strpos($value, 'mul') !== false && $do) {
        $numbers[0][$key] = str_replace('mul(', '', $value);
        $numbers[0][$key] = str_replace(')', '', $numbers[0][$key]);
        $numbers[0][$key] = explode(',', $numbers[0][$key]);
        $numbers[0][$key] = $numbers[0][$key][0] * $numbers[0][$key][1];
    }
    if (strpos($value, 'mul') !== false && !$do) {
        $numbers[0][$key] = 0;
    }
    if (strpos($value, 'do()') !== false) {
        $do = true;
    } else if (strpos($value, 'don\'t()') !== false) {
        $do = false;
    }
}

print_r(array_sum($numbers[0]));
?>