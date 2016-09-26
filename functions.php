<?PHP
function read_line($line)
{
	$line = trim($line);
	if(preg_match('/^(.*?)#/',$line, $ret))
	{
		$ret = preg_replace("/#/" , "\0" , $ret);
		echo $ret[0]."<BR>";
	}
	else
		echo $line."<BR>";
}
?>
