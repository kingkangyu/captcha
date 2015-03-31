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
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#refresh').click(function(){
				$('#captcha').attr('src','captcha.php?r='+Math.random());
				return false;	
			});	
		});
	</script>
</head>
<body>

	<form method='post' action='./captchaform.php'>
		<p>
			<lable>Captcha:</lable>
			<img id='captcha' src="./captcha.php?r=<?php echo mt_rand();?>" />
			<a id="refresh" href=''>Refresh</a>
		</p>
		<p>
			<lable>Input:</lable>
			<input type="text" name="captcha" />
		</p>
	</form>
</body>
</html>