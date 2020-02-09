<?php
require_once '../include/Service.php';
if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
}
$Service = new Service();
$users_id = $_SESSION['admin'];
if (isset($_POST['save'])) 
{
    $Data = array(
        'Title' => $_POST['Title'] ,
        'Content' => $_POST['Content'] ,
        'Lead' => $_POST['Lead'] ,
        'categoryID' => $_POST['categoryID']
    );
    $Update = $Service->Update('news',$Data,'`ID` = '.$_POST['ID']); 
    if ($Update) 
    {
        header("location: index.php");
    }
    else 
        echo "<script>alert('فایل باید عکس باشد')</script>";
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
            <select name="newsid">
             <?php
             $Titles = $Service->Selects('news');
             foreach ($Titles as $Value) 
                echo " <option value=".$Value['ID'].">".$Value['Title']."</option>";
            ?>
        </select>
        <input type='submit' name='show' value='نمایش'>
        <?php
        if(isset($_POST['show']))
        { 
            $News = $Service->Select('news','`ID` = '.$_POST['newsid']);
            ?>
            <input type="hidden" name="ID" value="<?php echo $News['ID'];?>">
            <input type="text" name="Title" placeholder="title" formenctype="text/plain" value="<?php echo $News['Title'];?>"><br>
            <textarea name="Content" style="left: 25px;width: 350px;text-align: center;" placeholder="متن خبر" formenctype="text/plain"><?php echo $News['Content'];?></textarea><br>
            <select name="categoryID" formenctype="text/plain">
                <?php
                $Category = $Service->Selects('category');
                foreach ($Category as $Value)
                    echo "<option value=".$Value['ID'].">".$Value['Name']."</option>";
                ?>  
            </select><br>
            <input type="text" name="Lead" placeholder="منبع" formenctype="text/plain" value="<?php echo $News['Lead'];?>">
            <input type="submit" name="save" value="بروزرسانی">
            <?php
        }
        ?>
    </form>
</div>
</body>
</html>
