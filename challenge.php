<?php

function primeNumber($n)
{
    $psdv = $n / 2;
    for ($i = 2; $i <= $psdv; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

// primeNumber(9);

if (primeNumber(17)) {
    echo "number is prime number";
} else {
    echo "Number isn't prime number";
}

int sum(int a,int b);