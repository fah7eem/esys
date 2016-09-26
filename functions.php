<?PHP
function read_line($line)
{
	$line = trim($line);
	if($line[0] != '#')
	{
		preg_match('/^(.*?)#/',$line, $ret);
		$ret = preg_replace("/#/" , "\0" , $ret);
		echo $ret[0]."<BR>";
	}
}
?>
