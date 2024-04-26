<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>افزدون کاربر</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

	</head>
	<style media="screen">
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

	<body onload="startTime()" >
	<div class="back">
		<!--هدر سایت-->
		<?php
		include_once("header-admin.php");
		include_once('session.php');
		?>
		<br/><br/><br/>
		<!--فرم ورود اطلاعات-->
    <form action="insert-user.php" method="post" >
      <div class="row" >
        <div class="col-4"> </div>
        <div class="form-group col-4" style="direction:rtl; text-align: right;">
          <label for="usr">نام و نام خانوادگی :</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="col-4"> </div>
        <div class="col-4"> </div>
        <div class="form-group col-4" style="direction:rtl; text-align: right;">
          <label>شماره کاربری :</label>
          <input type="text" name="userid" class="form-control">
        </div>
        <div class="col-4"> </div>
				<div class="col-4"> </div>
				<div class="form-group col-4" style="direction:rtl; text-align: right;">
					<label for="pwd">گذرواژه :</label>
					<input type="password" name="pass" class="form-control">
				</div>
				<div class="col-4"> </div>
        <div class="col-4"> </div>
        <div class="form-group col-4" style="direction:rtl; text-align: right;">
          <label>شماره ملی :</label>
          <input type="text" name="id" class="form-control">
        </div>
        <div class="col-4"> </div>
		        <div class="col-4"> </div>
        <div class="form-group col-4" style="direction:rtl; text-align: right;">
					<label>طبقه بندی :</label>
           <select name="type" class="form-control">
						 <option value="">--</option>
						 <option value="1">کاربر</option>
						 <option value="2">مدیر</option>
					 </select>
        </div>
        <div class="col-4"> </div>
      </div>
			<center>
      <button class="btn btn-primary btn-md" type="submit" name="login"><i>ثبت</i></button>
		</center>
    </form>
		<br>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-3">
			 <input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
			 </div>
			 <div class="col-5">	</div>
		 </div>
		</div>
	</body>
</html>
