<?PHP

class expert
{
public $facts;
public $query;
public $rules = array();

public function __construct($file)
{
	foreach ($file as $line)
	$this->read_line($line);
}

public function getvars()
{
	echo $this->facts."<br>";
	echo $this->query."<br>";
	foreach ($this->rules as $i)
	echo $i."<br>";
}

private function read_line($line)
{
	$line = trim($line);
	if($line[0] != '#')
	{
	if(preg_match('/^(.*?)#/',$line, $ret))
	{
		$ret = preg_replace("/#/" , "\0" , $ret);
		$ret[0] = str_replace(' ', '', $ret[0]);
		$this->show($ret[0]);
	}
	else
	{
		$line = str_replace(' ', '' , $line);
		$this->show($line);
	}
	}
}

private function show($line)
{
	if($line[0] === '=')
		$this->facts = $line;
	else if($line[0] === '?')
		$this->query = $line;
	else 
		array_push($this->rules, $line);
}
}
?>
