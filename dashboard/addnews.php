<?php
require_once '../include/Service.php';
if(!isset($_SESSION['admin']))
{	
	header("location: ../login/");
}
$Service = new Service();

if (isset($_POST['save'])) 
{
	$listType = array(
		'image/gif',  'image/jpeg', 'image/png');

	$Data = array(
		'Title' => $_POST['title'],
		'Content' => $_POST['news'],
		'categoryID' => $_POST['category'],
		'Lead' => $_POST['source'],
		'userID' => $_SESSION['admin'],
		'Image' => $Service->Upload('upload','../upload/',$listType)
	);

	$Result = $Service->Insert('news',$Data);
	if ($Result) 
	{
		header("location: index.php");
	}else
	{
		echo "<script>alert('عملیات انجام نشد دوباره تلاش کنید')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>داشبورد</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body background="1.jpg">
	<div id="dashboard_menu">
		<ul>
			<li><a href="../showNews/index.php">خانه</a></li>
			<li><a href="addnews.php">اضافه کردن خبر</a></li>
			<li><a href="deletenews.php">حذف کردن خبر</a></li>
			<li><a href="editnews.php">تغییر دادن اخبار</a></li>
			<li><a href="../BOT/sendNews.php">ارسال در تلگرام</a></li>
		</ul>
	</div>
	<div class="form">
		<div class="title"></div>
		<form method="post" action="#" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="عنوان" formenctype="text/plain"><br>
			<textarea name="news" style="left: 25px;width: 350px;text-align: center;" placeholder="متن خبر" formenctype="text/plain"></textarea><br>
			<select name="category" formenctype="text/plain">
				<?php
				$Category = $Service->Selects('category');
				foreach ($Category as $Value)
					echo "<option value=".$Value['ID'].">".$Value['Name']."</option>";
				?>			
			</select><br>
			<input type="text" name="source" placeholder="منبع" formenctype="text/plain">
			<input type="file" name="upload"><br>
			<input type="submit" name="save" value="اعمال">
		</form>
	</div>
</body>
</html>