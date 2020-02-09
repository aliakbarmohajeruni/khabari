<?php

require_once '../include/Service.php';
if(!isset($_SESSION['admin']))
{
	header("Location: ../login.php");
}
  $Service = new Service();
if(isset($_POST['Delete']))
{
  $Result = $Service->Delete('news','`ID` = '.$_POST['news']);
  if ($Result) 
  {
    header("Location: index.php");
        # code...
  }
  else
    die('noting delete , try again...');
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
    <form action="#" method="post">
     <select name="news">
       <?php
       $Titles = $Service->Selects('news');
       foreach ($Titles as $Value) 
        echo " <option value=".$Value['ID'].">".$Value['Title']."</option>";
      ?>
    </select>
    <input type="submit" name="Delete" value="حذف کردن">
  </form>
</div>
</body>
</html>
