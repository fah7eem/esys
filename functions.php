<?PHP

$facts = '';
$query = '';
$rules = array();
function read_line($line)
{
	$line = trim($line);
	if($line[0] != '#')
	{
	if(preg_match('/^(.*?)#/',$line, $ret))
	{
		$ret = preg_replace("/#/" , "\0" , $ret);
		$ret[0] = str_replace(' ', '', $ret[0]);
		show($ret[0]);
	}
	else
	{
		$line = str_replace(' ', '' , $line);
		show($line);
	}
	}
}

function show($line)
{
	if($line[0] === '=')
		$GLOBALS['facts'] = $line;
	else if($line[0] === '?')
		$GLOBALS['query'] = $line;
	else 
		array_push($GLOBALS['rules'], $line);
}
?>
