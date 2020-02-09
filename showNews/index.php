<?php
require_once '../include/Service.php';

$Service = new Service();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>خوش آمدید</title>
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
</head>
<body>
 <div class="time">
 <?php 
 include('time/jdf.php');
  echo jdate('H:i:s  | l, j F Y');
 ?>
 </div>





  <div class="menu-wrapper">
    <div class="menu">
      <ul>
        <li><a href="index.php" class="active">خانه</a></li>
        <li><a href="../login/index.php" class="active">ورود</a></li>
        <li><a href="../archive/" class="active">ارشیو خبر</a></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <div class="call">
      <h1></h1>
    </div>
  </div>
  <!--- menu-wrapper div end -->
  <div class="clearing"></div>
  <div class="border-bottom"></div>
  <div class="logo-wrapper">
    <div class="shadow"><img src="images/logo-wrap-left.jpg" /></div>
    <div class="logo">
      <h1 style="text-align:center">خبر گزاری هنرمندان سینما و تئاتر</h1>
    </div>
    <div class="rightshadow"><img src="images/logo-wrap-right.jpg" /></div>
  </div>
  <div class="clearing"></div>
  <div class="banner-wrapper">
    <div class="bannerlef"><img src="images/banner-wrap-left.jpg" /></div>
    <div class="banner-container">
      <div class="banner">
      <h1 style="text-align: center;color:black"><b> تیزر فیلم سینمایی مطرب </b></h1>
          <video controls style="width: 955px; height: 300px;margin: 25px auto;border: 0px solid #fff;">
            <source src="tizzer.mp4" type="video/mp4">
          </video>
      </div>
      <div class="bannerright"><img src="images/banner-wrap-right.jpg"/></div>
    </div>
    <!--- banner wrapper div end -->
    <div class="clearing"></div>
    <div class="container">
      <div class="page-wrapper">
        <div class="primary-content">
          <div class="panel">
            <div class="title">

              <?php
              $lastNews = $Service->Select('news','','ID','DESC'); 

              ?>
              <h1><?php echo $lastNews['Title']; ?></h1>
              <h2>منتشر شده از <?php echo $lastNews['Title']; ?></h2>
            </div>
            <div class="content">
              <p><?php echo substr($lastNews['Content'],0 , 100)." ... "; ?></p>



              <div class="button-link"><a href="../generic.php?ID=<?php echo $lastNews['ID'];?>">بیشتر</a></div>
            </div>
          </div>
        </div>
        <div class="sidebar">
          <div class="panel">
            <div class="img"><img width="255" height="175" src=<?php echo $lastNews['Image']; ?>></div>
          </div>
        </div>
      </div>
      <div class="panel-wrapper">
        <div class="panel marRight30">
          <div class="title">
            <h1>آخرین خبر فرهنگی</h1>
          </div>

          <?php
          $lastNews = $Service->Select('news','`categoryID` = 2','ID','DESC'); 
          ?>
          <div class="imgbg">
            <div class="img"><img width="280" height="175" src="<?php echo $lastNews['Image'];?>"/></div>
          </div>
          <div class="content">
            <h2><?php echo $lastNews['Title'];?> </h2>
            <p><?php echo substr($lastNews['Content'],0 , 100)." ... "; ?></p>
            <div class="button-link"><a href="../generic.php?ID=<?php echo $lastNews['ID'];?>">بیشتر</a></div>
          </div>
        </div>
        <div class="panel marRight30">
          <div class="title">
            <h1>اتفاقات تازه در سینما</h1>
          </div>
          <?php
          $News = $Service->Selects('news','`categoryID` = 4','ID','DESC','LIMIT 10'); 
          foreach ($News as $Value) 
          {
            ?>


            <div class="mid-panel">
              <div class="left marRight30">
                <div class="imgbg">
                  <div class="img"><img width="85" height="100" src="<?php echo $Value['Image'];?>"/></div>
                </div>
              </div>
              <div class="right"> <a href="../generic.php?ID=<?php echo $Value['ID'];?>">مشاهده ی خبر</a>
                <p class="padTop10"><?php echo $Value['Title'];?></p>
              </div>
            </div>

            <?php
          }
          ?>

        </div>
        <div class="panel">
          <div class="title">
            <h1>آخرین خبر ها</h1>
            <h2>در این قسمت بدون دسته بندی اخرین خبرها منتشر میگرردد.</h2>
          </div>
          <div class="content">
            <p>تمامی خبر ها زیر نظر وزارت مطبوعات و خبرگزاری های داخلی و وزارت فرهنگ و ارشاد اسلامی میباشد.</p>

            <div class="right-panel">
              <ul>
               <?php
               $News = $Service->Selects('news','','ID','DESC','LIMIT 35'); 
               foreach ($News as $Value) 
               {
                ?>
                <li><a href="../generic.php?ID=<?php echo $Value['ID'];?>"><?php echo $Value['Title']; ?></a></li>
                <?php
              }
              ?>

            </ul>

          </div>
        </div>
        <!--- panel wrapper div end -->
      </div>
      <!--- container div end -->
      <div class="clearing"></div>
      <!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>

		<li><a href="http://localhost/generic.php?ID=20" target="_blank"><img src="data1/images/lebas_shakhsi.jpg" alt="ماجرای سکانس‌هایی که از فیلم «لباس شخصی» حذف شد" title="ماجرای سکانس‌هایی که از فیلم «لباس شخصی» حذف شد" id="wows1_0"/></a></li>
		<li><a href="http://localhost/generic.php?ID=16" target="_blank"><img src="data1/images/katoni.jpg" alt="عذرخواهی کارگردان سریال «کتونی زرنگی»" title="عذرخواهی کارگردان سریال «کتونی زرنگی»" id="wows1_1"/></a></li>
		<li><a href="http://localhost/generic.php?ID=15" target="_blank"><img src="data1/images/3.jpg" alt="سیامک انصاری همبازی رضا عطاران شد!" title="سیامک انصاری همبازی رضا عطاران شد!" id="wows1_2"/></a></li>
		<li><a href="http://localhost/generic.php?ID=14" target="_blank"><img src="data1/images/2.jpg" alt="پایان ممنوعیت حضور بهروز وثوقی در سینمای ایران؟" title="پایان ممنوعیت حضور بهروز وثوقی در سینمای ایران؟" id="wows1_3"/></a></li>
		<li><a href="http://localhost/generic.php?ID=13" target="_blank"><img src="data1/images/1.jpg" alt="اولین واکنش فرزند غلامرضا تختی به فیلم «تختی»" title="اولین واکنش فرزند غلامرضا تختی به فیلم «تختی»" id="wows1_4"/></a></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="ماجرای سکانس‌هایی که از فیلم «لباس شخصی» حذف شد"><span><img src="data1/tooltips/lebas_shakhsi.jpg" alt="ماجرای سکانس‌هایی که از فیلم «لباس شخصی» حذف شد"/>1</span></a>
		<a href="#" title="عذرخواهی کارگردان سریال «کتونی زرنگی»"><span><img src="data1/tooltips/katoni.jpg" alt="عذرخواهی کارگردان سریال «کتونی زرنگی»"/>2</span></a>
		<a href="#" title="سیامک انصاری همبازی رضا عطاران شد!"><span><img src="data1/tooltips/3.jpg" alt="سیامک انصاری همبازی رضا عطاران شد!"/>3</span></a>
		<a href="#" title="پایان ممنوعیت حضور بهروز وثوقی در سینمای ایران؟"><span><img src="data1/tooltips/2.jpg" alt="پایان ممنوعیت حضور بهروز وثوقی در سینمای ایران؟"/>4</span></a>
		<a href="#" title="اولین واکنش فرزند غلامرضا تختی به فیلم «تختی»"><span><img src="data1/tooltips/1.jpg" alt="اولین واکنش فرزند غلامرضا تختی به فیلم «تختی»"/>5</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript image slider</a> by WOWSlider.com v9.0</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
     


        <div class="panel marRight30">
          <div class="title">
            <h1></h1>
            <h2>وبسایت خبری هنرمندان سینما و تئاتر </h2>
          </div>
          <div class="midcontent">
            <div class="midcontentlink marRight40">
              <ul>
                <li><a href="#">www.farsnews.com</a></li>
                <li><a href="#">www.bbc.com</a></li>
                <li><a href="#">www.fotoya.com</a></li>
                <li class="borderNone"><a href="#">wwww.yjc.ir</a></li>
              </ul>
            </div>
            <div class="midcontentlink">
              <ul>
                <li><a href="#">www.farsnews.com</a></li>
                <li><a href="#">www.bbc.com</a></li>
                <li><a href="#">www.fotoya.com</a></li>
                <li class="borderNone"><a href="#">wwww.yjc.ir</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel">
          <div class="title">
            <h1>ارتباط با ما</h1>
            <h2>ما را دنبال کنید</h2>
          </div>
          <div class="social-media">
            <ul>
              <li><a href="#"><img src="images/icon-ol.jpg"/></a></li>
              <li><a href="#"><img src="images/icon-fb.jpg"/></a></li>
              <li><a href="#"><img src="images/icon-twitter.jpg"/></a></li>
              <li><a href="#"><img src="images/icon-linkdin.jpg"/></a></li>
              <li><a href="#"><img src="images/icon-fb.jpg"/></a></li>
            </ul>
          </div>
          <h2 class="padBottom10">تلفن ، تلگرام</h2>
          <div class="infolinks marginBottom"> <a href="https://t.me/lastnews96">کانال تلگرام</a> <br><a href="#">+98 935 707 9065</a></div>
        </div>
      </div>
      <div class="footer-wrapper">
        <div class="footer">
          <p> © 2019All Rights Reserved.<a href="http://www.alltemplates.com"> < www.alltemplateneeds.com ></a> Images From: <a href="http://photorack.net">www.photorack.net</a> </p>
        </div>
      </div>
    </body>
    </html>
