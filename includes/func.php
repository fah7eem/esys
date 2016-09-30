<?PHP

function 	hello()
{
	echo "hello world";
}

function	and_($line)
{
	$i = 0;
	while($line[$i])
	{
		if($line[$i] === '+')
		{
			$a =	$line[$i - 1];
			$b =	$line[$i + 1];
			if($$a === 1 and $$b === 1)
				return 1;
			else
				return 0;
		}
		$i++;
	}	

}

function	or_($line)
{
	$i = 0;
	while($line[$i])
	{
		if($line[$i] === '|')
		{
			$a =    $line[$i - 1];
			$b =    $line[$i + 1];
			if($$a === 1 or $$b === 1)
				return 1;
			else
				return 0;
		}
		$i++;
	}

}

function	xor_($line)
{
	$i = 0;
	while($line[$i])
	{
		if($line[$i] === '^')
		{
			$a =    $line[$i - 1];
			$b =    $line[$i + 1];
			if($$a === 1 xor $$b === 1)
				return 1;
			else
				return 0;
		}
		$i++;
	}

}
?>
