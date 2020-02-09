<?php
require '../include/Service.php';
$Login = new Service();
if (isset($_POST['login'])) 
{
	$Result = $Login->Login($_POST['userName'],$_POST['Password']);
	if ($Result) 
	{
		$_SESSION[$Result['Type']] = $Result['ID'];
		header("location: ../dashboard/");
	}else
	{
		echo "<script>alert('نام کاربری یا رمز عبور صحیح نیست')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ورود</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body background="img/dashboard.jpg">
	<div class="form">
    <div class="title"></div>
		<form method="post" action="#">
			<input type="text" name="userName" placeholder="نام کاربری"><br>
			<input type="password" name="Password" placeholder="رمز عبور"><br>
			<input type="submit" name="login" value="ورود">
		</form>
	</div>
</body>
</html>