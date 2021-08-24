<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>صفحه کاربر</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

	</head>
	<style media="screen">
		a:link,a:visited{
			color:white;
		}
		a:hover{
			text-decoration: none;
		}
		button{
			width:230px;
		}
		@font-face {
		 font-family: 'b nazanin';
		 src: url('../css/BNazanin.ttf') format('woff2'),
						url('../css/BNazanin.ttf') format('woff'),
						url('../css/BNazanin.ttf') format('truetype');
	 }
	 span{
		 font:bold 22px b nazanin;
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
		<?php
		 include_once('header-user.php');
		 include_once('session.php');
		 ?>
		 <center>
     <br/><br/>
		 <a href="show-document.php">
			 <button type="button" name="show-document" class="btn btn-primary btn-md"><span>
			 مشاهده تمامی اسناد
		 </span></button>
		 </a>
		 <br/><br/>
		 <a href="search-document.php">
			 <button type="button" name="show-document" class="btn btn-primary btn-md"><span>
			 جستجوی اسناد
			 </span></button>
		 </a>
		 <br/><br/>
		 <a href="add-document.php">
			 <button type="button" name="show-document" class="btn btn-primary btn-md"><span>
			 افزودن سند
			</span>  </button>
			</a>
     </center>
		 <br>
		 <div class="row">
			 <div class="col-5"></div>
			 <div class="col-2">
		 	 	<input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
		 		</div>
				<div class="col-5">	</div>
			</div>
			</div>
	</body>
</html>
