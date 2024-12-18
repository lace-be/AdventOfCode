<?php
//read file
$myfile = fopen("input.txt", "r") or die("Unable to open file!");
//asign file to variable
$numbers1 = array();
$numbers2 = array();
while (!feof($myfile)) {
    $numbers = fgets($myfile);
    $numbers = explode("   ", $numbers);
    $numbers1[] = (int) trim($numbers[0]);
    $numbers2[] = (int) trim($numbers[1]);
}

sort($numbers1);
sort($numbers2);

$differentials = array();

$count = array_count_values($numbers2);
$result = 0;
foreach ($numbers1 as $number) {
    //check how many times the number appears in the numbers2 array
    if (array_key_exists($number, $count)) {
        $result += $number * $count[$number];
    }
}


print_r($result);

fclose($myfile);
?>