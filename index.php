<?PHP
include ('functions.php');
echo "<h1>Expert System</h1>";

if($_POST['subindex'] === 'OK' and $_FILES['file'])
{	echo "<div id='ans' >";
	$target = file($_FILES['file']['tmp_name']);
	foreach ($target as $line)
		read_line ($line);
	echo "</div>";
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
	font-size: 150%;
	}
	#ans 
	{
	background-color: #990099;
	color: white;
	text-align: center;
	box-shadow: 10px 10px 5px #888888;
	padding: 15px;
	}
</style>
</HEAD>
<BODY>
<form name='fileup' action='index.php' method='POST' enctype="multipart/form-data">
<input for='file' type='file' name='file'/>
<br><input type='submit' name='subindex' value='OK' />
<input type='submit' value='Refresh' />
</form>
</BODY>
</HTML>
