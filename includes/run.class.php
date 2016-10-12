<?PHP
include_once('expert.class.php');

class run extends expert
{
	public $alpha = array('0'=> 0, '1' => 1, 'A' => 0 , 'B' => 0 , 'C' => 0 , 'D' => 0 , 'E' => 0 , 'F' => 0,
			'G' => 0 , 'H' => 0 , 'I' => 0 , 'J' => 0 , 'K' => 0 , 'L' => 0 , 'M' => 0 , 
			'N' => 0 , 'O' => 0,'P' => 0 , 'Q' => 0 , 'R' => 0 , 'S' => 0 , 'T' => 0 , 
			'U' => 0 , 'V' => 0 , 'W' => 0 , 'X' => 0, 'Y' => 0 , 'Z' => 0);
	public $left = array();
	public $right = array();
	public $imp = array();
	public	$chk = array();

	public function __construct($file , $argnl)
	{
		parent::__construct($file, $argnl);
		$this->assign();
	}

	public function	print_alpha()
	{
		foreach ($this->alpha as $elem => $line)
		{
			echo $elem.":".$line.$this->nl;
		}
	}

	public function display()
	{
		$i = 0;	
		while($this->query[$i])
		{
			$k = $this->query[$i];
			if(ctype_alpha($k))
			{
				echo $k." is ";
				if($this->alpha[$k] === 1)
					echo "True";
				else
					echo "False";
				echo $this->nl;
			}
			$i++;
		}	
	} 

	public function test()
	{
		$this->getvars();
		echo "-------------------------------".$this->nl;
		$this->recur_();
		$this->display();
	}

	private function recur_()
	{
		$this->change_();
		$this->chk = array();
		$this->chk = array_combine($this->right , $this->left);	
		foreach($this->chk as $rht => $lft)
		{
			$a = $lft;
			$b = $rht;
			if($a !== $this->alpha[$b])
			{
				$this->alpha[$b] = $a;
				$this->recur_();
			}
			else if(strlen($b) > 2)
			{
				if($this->solver_r($b, $a) > 0)
					$this->recur_();
			}
		}	
	}

	private function change_()
	{	
		$this->left = array();
		$this->right = array();	
		$this->imp = array();
		foreach($this->rules as $rule)
		{

			if(strpos($rule, '=') !== false)
				array_push($this->imp, '=');				
			else if (strpos($rule, '_') !== false)
				array_push($this->imp, '_');

			$split = explode("=", $rule);
			$line = $split[0];
			array_push($this->right, $split[1]);

			if(preg_match_all('/\((.*?)\)/', $line, $match))
			{
				foreach ($match[0] as $i)
					$line = str_replace($i,$this->solver_($i),$line);
			}	
			if(!$line[1])
				array_push($this->left,$this->alpha[$line[0]]);
			else
			{
				$p = $this->solver_($line);
				array_push($this->left, $p);
			}
		}
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

	private function solver_($line)
	{
		$k = 0;
		while($k < 4)
		{
			if($k === 0)
				$chk = '!';
			else if($k === 1)
				$chk = '+';
			else if ($k === 2)
				$chk = '|';
			else if ($k === 3)
				$chk = '^';
			$i = 0;	
			while($line[$i])
			{
				if($line[$i] === $chk)
				{
					$a = $this->alpha[$line[$i - 1]];
					$o = $line[$i];
					$b = $this->alpha[$line[$i + 1]];
					$p = $this->switch_($a, $o , $b);

					if($chk !== '!')	
						$line[$i - 1] = $p;
					$line[$i] = ' ';
					$line[$i + 1] = $p;
				}	
				$i++;
			}
			$k++;
		}
		return ($p);	
	}

	private function solver_r($b , $a)
	{
		$i = 0;
		$temp = $b;
		while($temp[$i])
		{
			if($this->solver_($temp) !== $a)
				$temp = $b;
			else
				return 0;
			if ( $this->alpha[$temp[$i]] === 1)
				$temp[$i] = '0';
			else if ($this->alpha[$temp[$i]] === 0)
				$temp[$i] = '1';
			$i++;
		}
		$i = 0;
		$k = 0;
		while($b[$i])
		{
			if($this->alpha[$b[$i]] !== $temp[$i] 
					&& ($temp[$i] === '1' or $temp[$i] === '0'))
			{
				if ($temp[$i] === '1')
					$this->alpha[$b[$i]] = 1;
				else
					$this->alpha[$b[$i]] = 0;
				$k++;
			}
			$i++;
		}
		return ($k);
	}

	protected function switch_($value1, $operator, $value2)
	{
		switch ($operator) 
		{
			case '!':
				return !$value2;
			case '+':
				return $value1 & $value2;
				break;
			case '|':
				return $value1 | $value2;
				break;
			case '^':
				return $value1 ^ $value2;
				break;
		}
	}
}
?>
