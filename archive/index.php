<?php
require '../include/Service.php';
$Service = new Service();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>آرشیو</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>آرشیو</title>
  <link href="../showNews/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="menu-wrapper">
    <div class="menu">
      <ul>
        <li><a href="../index.php" class="active">خانه</a></li>
        <li><a href="../login/index.php" class="active">ورود</a></li>
        <li><a href="../archive/" class="active">ارشیو خبر</a></li>
      </ul>
    </div>
    <div class="call">
      <h1></h1>
    </div>
  </div>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column2">تصویر</th>
									<th class="cell100 column4">منبع</th> 
									<th class="cell100 column3">تاریخ</th>
									<th class="cell100 column1">تیتر خبر</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php
									$archive = $Service->Selects('news','','ID','DESC');
									foreach ($archive as $Value) 
									{
									?>
									<tr class="row100 body">
										<td class="cell100 column4"><img width="200" height="150" class="img responsive" src="<?php echo $Value['Image']; ?>"></td>
										<td class="cell100 column3"><?php echo $Value['Lead']; ?></td>
										<td class="cell100 column2"><?php echo $Value['sendTime']; ?></td>
										<td class="cell100 column1"><a href="../generic.php?ID=<?php echo $Value['ID'];?>"><?php echo $Value['Title']; ?></a></td>
									</tr>
									<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);
			$(window).on('resize', function(){
				ps.update();
			})
		});	
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>