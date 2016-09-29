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
		foreach($this->rules as $line)
		{
		if(preg_match_all('/\((.*?)\)/', $line, $matches))
			print_r ($matches[1]);
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
}
?>
