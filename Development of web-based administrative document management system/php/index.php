<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>صفحه ورود اطلاعات</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>
	</head>
	<style media="screen">
	a:link,a:visited{
		color:gray;
	}
	a:hover{
		text-decoration: none;
	}
		label,i{
			font: bold 26px b nazanin;
		}
		@font-face {
		 font-family: 'b nazanin';
		 src: url('../css/BNazanin.ttf') format('woff2'),
						url('../css/BNazanin.ttf') format('woff'),
						url('../css/BNazanin.ttf') format('truetype');
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
		<!--هدر سایت-->
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


		<br/><br/><br/>
		<!--فرم ورود اطلاعات-->

		<div class="back">
		<form method="post" action="login.php">
			<div class="row" >
				<div class="col-4"> </div>
				<div class="form-group col-4" style="direction:rtl; text-align: right;">
					<label>شماره کاربری :</label>
				<input class="form-control" type="number" name="userid" required> <br><br>
				<div class="col-4"> </div>
				<label>گذرواژه :</label>
        <input class="form-control" name="pass" type="password" required >     <br><br>
				<center>
				<button type="submit" class="btn btn-primary btn-md" name="login">
					<i>ورود</i></button>
				</center>
				</div>
		</form>
 		</div>
		</br>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<a href="forgot.php">فراموشی گذرواژه</a>
			</div>
			<div class="col-4"></div>
		</div>
	</body>
</html>
