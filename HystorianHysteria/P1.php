<?php
//read file
$myfile = fopen("input.txt", "r") or die("Unable to open file!");
//asign file to variable
$numbers1 = array();
$numbers2 = array();
while (!feof($myfile)) {
    $numbers = fgets($myfile);
    $numbers = explode("   ", $numbers);
    $numbers1[] = $numbers[0];
    $numbers2[] = $numbers[1];
}

sort($numbers1);
sort($numbers2);

$differentials = array();
for ($i = 0; $i < count($numbers1); $i++) {
    if ($numbers1[$i] < $numbers2[$i]) {
        $differentials[] = $numbers2[$i] - $numbers1[$i];
    } else {
        $differentials[] = $numbers1[$i] - $numbers2[$i];
    }
}

$result = array_sum($differentials);

print_r($result);

fclose($myfile);
?>