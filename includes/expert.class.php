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
		$this->change_rules();
	}

	public function getvars()
	{
		foreach ($this->rules as $i)
			$this->print_i($i);
			echo "<br>".$this->facts."<br>";
		echo $this->query."<br>";
	}

	private function read_line($line)
	{
		$line = trim($line);
		if($line[0] != '#')
		{
			if(preg_match('/^(.*?)#/',$line, $ret))
			{
				$ret = preg_replace("/#/" , "\0" , $ret);
				$ret[0] =  preg_replace('/\s\s+/', '', $ret[0]);
				$ret[0] = str_replace(' ', '', $ret[0]);
				$this->show($ret[0]);
			}
			else
			{
				$line =  preg_replace('/\s\s+/', '', $line);
				$line = str_replace(' ', '' , $line);
				$this->show($line);
			}
		}
	}
	
	public function print_i($str)
	{	
		$i = 0;
		while($str[$i])
		{
			if($str[$i] === '=' )
				echo '=>';
			else if ($str[$i] === '_')
				echo '<=>';
			else 
				echo $str[$i];
			$i++;
		}
		echo "<br>";	
	}

	private function show($line)
	{
		if($line[0] === '=')
			$this->facts = $line;
		else if($line[0] === '?')
			$this->query = $line;
		else if (preg_match('/=>/', $line)) 
			array_push($this->rules, $line);
	}

	public function change_rules()
	{
		$i = 0;
		while ($this->rules[$i])
		{
			$this->rules[$i] = preg_replace('/=>/' , '=', $this->rules[$i]);
			$this->rules[$i] = preg_replace('/<=/' , '_', $this->rules[$i]);
			$i++;
		}
	}
}
?>
