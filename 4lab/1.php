<?php

$str = 'qhb qcb qeb qeeq qdcq qxeq';
$qq = '/q..q/';
preg_match_all($qq, $str, $matches_q);

echo "Результат для a..a:\n";
print_r($matches_q[0]);
