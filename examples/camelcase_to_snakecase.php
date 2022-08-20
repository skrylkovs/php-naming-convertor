<?php
include_once "Converter.php";

$array = [
    'capoSerg' => 4,
    'ibizaPopa' => 9,
    'iamLoveMyGovenmentNotMuch' => [1,4,5]
];

$array = \Skrylkovs\Library\Converter::convertArrayKeys($array);

print_r($array);
