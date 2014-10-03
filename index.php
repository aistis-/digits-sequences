<?php

include 'SequenceGenerator.php';

$generator = new SequenceGenerator();

/*
 * Permitted digits in positions
 * 'position' => array of permitted digits
 */
$rules = array(
    '1' => array(1, 2),
    '3' => array(3),
);

var_dump($generator->generatePermutations(3, $rules));
