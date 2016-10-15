<?PHP

class expert
{
	public $facts;
	public $query;
	public $rules = array();
	public $nl;
	public function __construct($file, $argnl)
	{
		foreach ($file as $line)
			$this->read_line($line);
		$this->change_rules();
		$this->nl = $argnl;
	}

	public function getvars()
	{
		foreach ($this->rules as $i)
		{
			if((strchr($i, '=') or strchr($i, '_')) && (ctype_alpha($i[0])
			or $i[0] === '(' or $i[0] === '!' ) && $this->check_syntax($i) === 0)
			$this->print_i($i);
			else
				echo "Syntax Error".$this->nl;
		}
			echo $this->nl.$this->facts.$this->nl;
		echo $this->query.$this->nl;
	}
	
	private function check_syntax($line)
	{
		$i = 1;
		while($line[$i])
		{
			$c = $line[$i];
			if($c === '=' or $c ==='_' or $c === '+' or 
			$c === '|' or $c === '^')
			{
				if(!ctype_alpha($line[$i + 1]))
				{
					if($line[$i + 1] !== '!' && $line[$i + 1] !== '(')
					return 1;
				}
				if(!ctype_alpha($line[$i - 1]))
				{
					if($line[$i - 1] !== ')')
					return 1;
				}
			}
			else if($c === '(')
			{
				if(ctype_alpha($line[$i - 1]))
					return 1; 
			}
			else if($c === ')')
			{
				if(ctype_alpha($line[$i + 1]) or $line[$i + 1] === '!')
					return 1;
			}
			else if(ctype_alpha($c))
			{
				if(ctype_alpha($line[$i + 1]) or ctype_alpha($line[$i - 1])) 
					return 1;
			}
			else if ($c === '!')
			{
				if($line[$i - 1] === '!')
					return 1;
				if(!ctype_alpha($line[$i + 1]))
					return 1;
			} 
			else
				return 1;
			$i++;
		}
		return 0;
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
		echo $this->nl;	
	}

	private function show($line)
	{
		if($line[0] === '=')
			$this->facts = $line;
		else if($line[0] === '?')
			$this->query = $line;
		else if (!empty($line)) 
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
