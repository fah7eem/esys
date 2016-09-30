<?PHP
include_once('expert.class.php');

class run extends expert
{
	public $alpha = array('A' => 0 , 'B' => 0 , 'C' => 0 , 'D' => 0 , 'E' => 0 , 'F' => 0,
			'G' => 0 , 'H' => 0 , 'I' => 0 , 'J' => 0 , 'K' => 0 , 'L' => 0 , 'M' => 0 , 
			'N' => 0 , 'O' => 0,'P' => 0 , 'Q' => 0 , 'R' => 0 , 'S' => 0 , 'T' => 0 , 
			'U' => 0 , 'V' => 0 , 'W' => 0 , 'X' => 0, 'Y' => 0 , 'Z' => 0);

	public function __construct($file)
	{
		parent::__construct($file);
		$this->assign();
	}

	public function	print_alpha()
	{
		foreach ($this->alpha as $elem => $line)
		{
			echo $elem.":".$line."<br>";
		}
	}

	public function test()
	{	
		$left = array();
		foreach($this->rules as $rule)
		{
			$i = 0;
			$split = explode("=", $rule);
			$line = $split[0];
			if(!$line[1])
				array_push($left,$this->alpha[$line[0]]);
			else
			{	
				while($line[$i])
				{
					if($line[$i] === '+' || $line[$i] === '|' || $line === '^')
					{
						$a = $this->alpha[$line[$i - 1]];
						$o = $line[$i];
						$b = $this->alpha[$line[$i + 1]];
					array_push($left, $this->switch_($a, $o , $b));
					}	
					$i++;
				}
			}
		}
		print_r ($left);
	}

	private function assign()
	{
		$i = 0;
		while($this->facts[$i])
		{
			$c = $this->facts[$i];
			if($c !== '=' and ctype_alpha($c))
				$this->alpha[$c] = 1;
			$i++;
		}	
	}

	protected function switch_($value1, $operator, $value2)
	{
		switch ($operator) 
		{
			case '+':
				return $value1 & $value2;
				break;
			case '|':
				return $value1 | $value2;
				break;
			case '^':
				return $value1 ^ $value2;
				break;
			default:
				return false;
		}
		return false;
	}
}
?>
