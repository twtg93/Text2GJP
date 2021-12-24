<?php
class GJPGet {
	public function get($raw) {
		require_once dirname(__FILE__)."/XORCipher.php";
		$xor = new XORCipher();
		$gjpencode = $xor->cipher($raw,37526);
		$gjpencode = base64_encode($gjpencode);
		$gjpencode = str_replace("+","-",$gjpencode);
		$gjpencode = str_replace("/","_",$gjpencode);
		return $gjpencode;
	}
}
?>
<!DOCTYPE html>
<html><script async src="https://arc.io/widget.min.js#SXrvhKhG"></script>
<head>
	<title>GJP Generator</title>
</head>
<body>
	<span style="font-family:sans-serif;">Hello, This is a Text to GJP Generator. GJP is what Geometry Dash developers do to use API Requests with the game. You should use a password or just a string of text to see how it works using the textbox below<br></span>
	<form method="post">
		<input type="password" name='GJPString'>
		<input type="submit" name='sm' value='OK'>
	</form>
	<?php
	if (isset($_POST['sm'])){
		$n=new GJPGet();
		echo '<br>'.$n->get($_POST['GJPString']);
	}
	?>
</body>
</html>