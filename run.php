#!/usr/bin/php
<?PHP
include_once('includes/run.class.php');
	
if ($argc == 2)
{
	$target = file($argv[1]);
	$expert = new run($target, " \n");	
	$expert->test();
}
?>
