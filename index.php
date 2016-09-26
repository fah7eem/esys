<?PHP
include ('functions.php');
echo "<h1> Welcome </h1> <br>";

if($_POST['subindex'] === 'OK' and $_POST['file'])
{
	$target = file($_POST['file']);
	foreach ($target as $line)
		 read_line ($line);
}
else
	echo "Add file<br>"
?>
<HTML>
<HEAD>
<title> Expert System </title>
</HEAD>
<BODY>
<form name='fileup' action='index.php' method='POST' >
<input type='file' name='file'/>
<input type='submit' name='subindex' value='OK' />
<input type='submit' value='Refresh' />
</form>
</BODY>
</HTML>
