<?php
	session_start();
	if(!isset($_SESSION['admin']))
	{	
		header("location: ../login/");
	}
?>

<!DOCTYPE html>
<html >
<head>
	<title>داشبورد</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body style="background:url('1.jpg');background-repeat: no-repeat;background-size: cover;background-position:center;">
	<div id="dashboard_menu">
		<ul>
			<li><a href="../showNews/index.php">خانه</a></li>
			<li><a href="addnews.php">اضافه کردن خبر</a></li>
			<li><a href="deletenews.php">حذف کردن خبر</a></li>
			<li><a href="editnews.php">تغییر دادن اخبار</a></li>
			<li><a href="../BOT/sendNews.php">ارسال در تلگرام</a></li>
		</ul>
	</div>

</body>
</html>