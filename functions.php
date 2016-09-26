<?PHP
function read_line($line)
{
	if($line[0] != '#')
	{
	   	preg_match('/^(.*?)#/',$line, $ret);
		foreach ($ret as $ret1 => $ret2)
		{
			$ret2 = preg_replace("/#/" , "\0" , $ret2);
			echo ($ret2)."<BR>";
		}
	}
}
?>
