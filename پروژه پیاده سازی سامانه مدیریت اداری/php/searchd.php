<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>نتایج</title>
		<script src="../js/clock.js" type="text/javascript"></script>
		<link href="../css/bootstrap-rtl-theme.css" type="text/css" rel="stylesheet"/>
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

	</head>
  <style media="screen">
    div.row,div.col-2
    {
      direction: rtl;
      text-align: right;
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
     ?>
     <br/><br/><br/>
<?php
 include_once("config.php");
 $num=$_POST['num'];
 $sender=$_POST['sender'];
 $reciver=$_POST['reciver'];
 $subject=$_POST['subject'];
 $date=$_POST['date'];
 $lev=$_POST['lev'];



 $query_array = array();
if ( ! empty( $num ) ) {
    $query_array[] = "num LIKE '%" . $num . "%'";
}
if ( ! empty( $sender ) ) {
    $query_array[] = "sender  LIKE '%" . $sender  . "%'";
}
if ( ! empty( $reciver ) ) {
    $query_array[] = "reciver LIKE '%" . $reciver . "%'";
}
if ( ! empty( $subject ) ) {
    $query_array[] = "subject LIKE '%" . $subject . "%'";
}
if ( ! empty( $date ) ) {
    $query_array[] = "date LIKE '%" . $date . "%'";
}
if ( ! empty( $lev ) ) {
    $query_array[] ="lev LIKE '%" . $lev . "%'";
}


$query_where = implode( ' OR ', $query_array );
$query = 'SELECT * FROM document WHERE ' . $query_where;

 $qry=mysqli_query($con,$query);
 if(!$qry)
 {
   echo "<script>alert('درخواست با مشکل مواجه گردید.');
         window.location='search-document.php'</script>";
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
	 <div class="col-5"></div>
	 <div class="col-2">
		<input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
		</div>
		<div class="col-5">	</div>
	</div>
	</div>

 	</body>
 </html>
