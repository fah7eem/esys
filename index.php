<?PHP
include ('functions.php');
echo "<h1>Expert System</h1>";

if($_POST['subindex'] === 'OK' and $_FILES['file'])
{
	$target = file($_FILES['file']['tmp_name']);
	foreach ($target as $line)
		read_line ($line);
}
?>
<HTML>
<HEAD>
<title> Expert System </title>
<style> 
	html 
	{
	display: table;
	margin: auto;
	background-color: #aa80ff;
	}
</style>
</HEAD>
<BODY>
<form name='fileup' action='index.php' method='POST' enctype="multipart/form-data">
<input for='file' type='file' name='file'/>
<br><br><input type='submit' name='subindex' value='OK' />
<input type='submit' value='Refresh' />
</form>
</BODY>
</HTML>
