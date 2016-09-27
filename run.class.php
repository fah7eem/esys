<?PHP
include_once('expert.class.php');

class run extends expert
{	
	private $alpha = array();
	
	public function	test()
	{
		echo strlen(trim($this->facts));
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
