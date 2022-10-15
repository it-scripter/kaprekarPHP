<?php
/*
 * Build and count Kaprekar numbers/constants
 * ver. 1.0 - Thorsten Born
 */

// set parameter
$min = 1000;
$showSingleSteps = false;
$showEachNumber = true;
$CRLF = "\r\n";

$max = $min * 10;
$distribution = [];
for ($i = $min; $i < $max; $i++) {
    $number = $i;
    $iteration = 0;
    $lastNumber = 0;
    // The loop should stop in case of an unforeseen error and avoid an infinite loop.
    while ($number !== $lastNumber & $iteration < 100) {
        $lastNumber = $number;
        $iteration++;

        $digits = str_split($number);
        // build first number
        rsort($digits);
        $firstNumber = (int)join($digits);
        // build second number
        sort($digits);
        $secondNumber = (int)join($digits);

        // calculate difference
        $number = $firstNumber - $secondNumber;

        if ($showSingleSteps) {
            echo $lastNumber . ' => ' . $firstNumber . ' - ' . sprintf('%04s', $secondNumber) . ' = ' . $number . $CRLF;
        }
    }
    if (!isset($distribution[$number])) {
        $distribution[$number] = 0;
    }
    $distribution[$number]++;
    if ($showEachNumber) {
        echo $i . ' ' . $iteration . ' ' . $number . $CRLF;
    }

}
echo '--- finished ---' . $CRLF;
print_r($distribution);

