<?php

$string = $_POST['name'] . " is " . $_POST['age'];

//simulate php doing a major work load
sleep('5');

$log = fopen('log.txt', 'a');
fwrite($log, "$string \n");
fclose($log);
