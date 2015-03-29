<?php
session_start();
if (isset($_POST['captcha']))
{
	if ( strcasecmp( $_POST['captcha'], $_SESSION['captcha']) == 0 ) {//ignore case compare
		echo 'input correct';
	}
	else
		echo '<p>captcha:'.$_SESSION['captcha'].'</p><p>your input:'.$_POST['captcha'].'</p>';
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<title>captcha</title>
</head>
<body>
	<form method='post' action='./captchaform.php'>
		<lable>captcha</lable>
		<img src="./captcha.php?r=<?php echo mt_rand();?>" />
		<lable>input</lable>
		<input type="text" name="captcha" />
	</form>
</body>
</html>