<?PHP
function read_line($line)
{
	$line = trim($line);
	if(preg_match('/^(.*?)#/',$line, $ret))
	{
		$ret = preg_replace("/#/" , "\0" , $ret);
		$ret[0] = str_replace(' ', '', $ret[0]);
		echo $ret[0]."<BR>";
	}
	else
	{
		$line = str_replace(' ', '' , $line);
		echo $line."<BR>";
	}
}

function operater($line)
{
}
?>
