<?php
//read file
$myfile = fopen("input.txt", "r") or die("Unable to open file!");

$result = 0;
while (!feof($myfile)) {
    $numbers = fgets($myfile);
    $numbers = explode(" ", $numbers);
    if (isSafe($numbers)) {
        $result++;
    }
}
print_r($result);

function isSafe($numbers)
{
    $isIncreasing = false;
    if ($numbers[0] < $numbers[1]) {
        $isIncreasing = true;
    }

    for ($i = 0; $i < count(value: $numbers) - 1; $i++) {
        if ($numbers[$i] < $numbers[$i + 1]) {
            if (!$isIncreasing) {
                return false;
            }
        } else {
            if ($isIncreasing) {
                return false;
            }
        }
        $difference = abs($numbers[$i] - $numbers[$i + 1]);
        if ($difference > 3 || $difference == 0) {
            //unsafe
            return false;
        }

    }
    return true;

}

?>