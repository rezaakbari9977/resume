<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ویرایش اطلاعات</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="../css/jquery.Bootstrap-PersianDateTimePicker.css" />

		<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript"></script>


	</head>
  <style media="screen">
	@font-face {
	 font-family: 'b nazanin';
	 src: url('../css/BNazanin.ttf') format('woff2'),
					url('../css/BNazanin.ttf') format('woff'),
					url('../css/BNazanin.ttf') format('truetype');
 }
		label,input
		{
			font:25px b nazanin;
		}
			 	.back::before {
	background-image: url(../file/download1.png);
	background-size: 45%;
	background-repeat: no-repeat;
	background-position: 50% 50px;
	content: "";
	display: block;
	position: absolute;
	top: 30px;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: -1;
	opacity: 0.3;
	}
  </style>
	<body onload="startTime()">
	<div class="back">
		<div class="row" style="direction:rtl; background-color:gray; color:white; ">
			<div class="col-7" style="text-align:right; padding-right:10%; font: bold 26px b nazanin;">
				سامانه مدیریت اسناد و مدارک اداری
			</div>

			<div class="col-5">
				<div class="date" style="float:left; font:  26px b nazanin; padding-left:10%;" >
					<?php include_once 'jdf.php';
					$date = jdate("Y/n/j");
					echo $date; ?>
				</div>
				<div id="txt" style="font:  26px b nazanin; float:right; padding-right:10%;"></script></div>
			</div>
		</div>

		<?php
		 include_once('config.php');
		 if (isset($_GET['edit']))
		 $num = $_GET['edit'];
		 else {
			 echo "<script>alert('درخواست با مشکل مواجه گردید.');
						 window.location='edit-document.php'</script>";
		 }
     $sql="select * from users where userid=".$num;
		 $qry=mysqli_query($con,$sql);
		 $r=mysqli_fetch_array($qry);
     if(!$qry)
     {
       echo "<script>alert('درخواست با مشکل مواجه گردید.');</script>";
       exit;
     }

		?>
		<br/><br/><br/>
			<form action="editu.php?id=<?php echo $num;?>" method="post">
				<div class="row" >
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
						<label for="usr">گذرواژه جدید :</label>
						<input type="password" name="pass" class="form-control">
					</div>
					<div class="col-4"> </div>
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
						<label for="usr">تکرار گذرواژه :</label>
						<input type="password" name="rpass" class="form-control">
					</div>
					<div class="col-4"> </div>
				</div>
				<center>
				<button class="btn btn-primary btn-md" style="font:24px b nazanin;" type="submit" onclick="return OnButton1();" name="login">
				<i>ثبت</i>
				</button>
			</center>
			</form>
		 <br>
		 <div class="row">
			 <div class="col-4"></div>
			 <div class="col-1">
				<input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
				</div>
				<div class="col-7">	</div>
			</div>
		</div>
	</body>
</html>
