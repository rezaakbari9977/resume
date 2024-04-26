<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>نمایش اسناد</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

	</head>
  <style media="screen">
    a:link,a:visited{
      color:blue;
    }
    a:hover{
      text-decoration: none;
    }
    button{
      width:230px;
    }
		table
		{
			direction: rtl;
			font:25px b nazanin;
			text-align: center;
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
	<div class="back">
		<?php
		 include_once('header-user.php');
		 include_once('session.php');
     $sql="select * from document";
		 $qry=mysqli_query($con,$sql);
     if(!$qry)
     {
       echo "<script>alert('درخواست با مشکل مواجه گردید.');</script>";
       exit;
     }
		 echo "<br/><br/><br/><br/>";
     $i=1;
     echo '<table direction=rtl width="80%" border="1" align="center">';
     echo '<tr bgcolor="#cccccc" align="center" style="font: bold 26px b nazanin;">';
     echo '<td>ردیف</td><td width="10%">شماره سند</td>';
     echo '<td width="20%">تاریخ</td><td width="20%">فرستنده</td>';
     echo '<td width="20%">گیرنده</td><td width="20%">موضوع</td>';
     echo '<td>سطح</td><td width="20%">عکس سند</td>';
     echo '</tr>';
     while($r=mysqli_fetch_array($qry))
     {
       echo '<tr bgcolor="'.(($i%2)?'#eeeeee':'#ffffff').'">';
       echo '<td>'.$i.'</td>';
			 echo '<td>'.$r['num'].'</td>';
			 echo '<td>'.$r['date'].'</td>';
			 echo '<td>'.$r['sender'].'</td>';
			 echo '<td>'.$r['reciver'].'</td>';
			 echo '<td>'.$r['subject'].'</td>';
			 echo '<td>'.$r['lev'].'</td>';
			 echo '<td><a href="'.$r['address'].'">
			 <button type="button" style="width:70px; margin:4px;" class="btn btn-success">مشاهده</button></a></td>';
			 echo '</tr>';
			 $i++;
     }
		 echo '</table>';
		 mysqli_close($con);
     ?>
		 <br>
		 <div class="row">
			 <div class="col-2"></div>
			 <div class="col-5">
		 	 	<input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
		 		</div>
				<div class="col-5">	</div>
			</div>
			</div>
	</body>
</html>
