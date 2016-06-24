<?php

$v1 = filter_input(INPUT_POST, "v1");
$v2 = filter_input(INPUT_POST, "v2");
$v3=$v1+$v2;

echo "v1: ".$v1." v2: ".$v2."=".$v3;
?>