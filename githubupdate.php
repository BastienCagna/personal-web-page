<?php 
$out = shell_exec('ls'); 
echo "ls output:<br />".$out;

$out = shell_exec('git pull'); 
echo "Output:<br />".$out;
?>
