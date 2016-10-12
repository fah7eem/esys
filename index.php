<?PHP
include_once('includes/run.class.php');
echo "<h1>Expert System</h1>";

if($_POST['subindex'] === 'OK' and $_FILES['file'])
{	echo "<div id='ans' >";
	$target = file($_FILES['file']['tmp_name']);
	$expert = new run($target, "<BR>");	
	$expert->test();
	echo "</div>";
}
?>
<HTML>
<HEAD>
<title> Expert System </title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</HEAD>
<BODY>
<form name='fileup' action='index.php' method='POST' enctype="multipart/form-data">
<input for='file' type='file' name='file'/>
<br><input type='submit' name='subindex' value='OK' />
</form>
</BODY>
</HTML>
