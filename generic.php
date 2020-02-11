<?php

require_once 'include/Service.php';


$Service = new Service();
$Result = $Service->Select('news','`ID` = '.$_GET['ID']);
if (!$Result) {
	die('صفحه ی مورد نظر یافت نشد');
}

$comment = new Comment();
$comment->store($_POST, $_GET);
$comments = $comment->index();

?>


<!DOCTYPE HTML>
<!--
	RTL Styles And Translation : MrCode.ir - https://mrcode.ir
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>نمایش خبر</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="showNews/assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="showNews/assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="showNews/assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="showNews/assets/css/ie8.css" /><![endif]-->
	<link rel="stylesheet" href="showNews/assets/css/rtl.css" />
</head>
<body>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<p>صفحه ی خبری : </p>
			<h1><?php echo $Result['Title'];?></h1>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Content -->
			<section id="content" class="main">
				<span class="image main"><img style="height: 500px;" src="<?php echo substr($Result['Image'],3);?>" alt="" /></span>
				<h2>تاریخ : <?php echo $Result['sendTime'];?></h2>
				<p>
					<h2>متن خبر :</h2>
					<?php echo $Result['Content']; ?>
				</p>
				<div>
					<form class="" action="" method="post">

						<div class="">
							<label for="">نام و نام خانوادگی</label>
							<input type="text" name="name">
						</div>

						<div class="">
							<label for="">متن نظر</label>
							<textarea name="body" rows="8" cols="80"></textarea>
						</div>

						<div class="">
							<input type="submit" name="comment" value="ثبت نظر">
						</div>
					</form>
				</div>

				<hr>
				<?php if($comments): ?>
				<?php foreach ($comments as $comment): ?>
				<div class="">
					<div class="comment-name">
						<p><?= $comment['name'] ?></p>
					</div>
					<div class="comment-time"><?= $comment['created_at'] ?></div>
					<div class="comment-body">
							<?= $comment['body'] ?>
					</div>
				</div>
				<hr>
			<?php endforeach; ?>
			<?php endif; ?>
			</section>
			<a style="visibility:hidden;" href="https://mrcode.ir" target="_blank">آموزش طراحی سایت</a>
		</div>

	</div>

	<!-- Scripts -->
	<script src="showNews/assets/js/jquery.min.js"></script>
	<script src="showNews/assets/js/jquery.scrollex.min.js"></script>
	<script src="showNews/assets/js/jquery.scrolly.min.js"></script>
	<script src="showNews/assets/js/skel.min.js"></script>
	<script src="showNews/assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="showNews/assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="showNews/assets/js/main.js"></script>

</body>
</html>
