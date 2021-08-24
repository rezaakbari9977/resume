<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ویرایش سند</title>
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
		<?php
		 include_once('header-user.php');
		 include_once('session.php');
		 if (isset($_GET['edit']))
		 $num = $_GET['edit'];
		 else {
			 echo "<script>alert('درخواست با مشکل مواجه گردید.');
						 window.location='edit-document.php'</script>";
		 }
     $sql="select * from document where num=".$num;
		 $qry=mysqli_query($con,$sql);
		 $r=mysqli_fetch_array($qry);
     if(!$qry)
     {
       echo "<script>alert('درخواست با مشکل مواجه گردید.');</script>";
       exit;
     }

		?>
		<br/><br/><br/>
			<form action="editd.php" method="post" name="form" enctype="multipart/form-data">
				<div class="row" >
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
						<label for="usr">شماره سند :</label>
						<input type="hidden" name="id" class="txtField" value="<?php echo $r['num']; ?>">
						<input type="number" name="num" class="form-control" value="<?php echo $r['num']; ?>">
					</div>
					<div class="col-4"> </div>
										<div class="col-4"> </div>
				 <div class="form-group col-4">
		            <label class="sr-only" for="exampleInput3">تاریخ</label>
		            <div class="input-group">
		                <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#exampleInput3">
		                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		                </div>
		                <input type="text" name="date" value="<?php echo $r['date']; ?>" class="form-control" id="exampleInput3" placeholder="تاریخ" data-placement="right" data-englishnumber="true" />
		            </div>
				</div>
					<div class="col-4"> </div>
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
						<label>فرستنده :</label>
						<input type="text" name="sender" class="form-control" value="<?php echo $r['sender']; ?>">
					</div>
					<div class="col-4"> </div>
				 <div class="col-4"> </div>
				 <div class="form-group col-4" style="direction:rtl; text-align: right;">
					 <label>گیرنده :</label>
					 <input type="text" name="reciver" class="form-control" value="<?php echo $r['reciver']; ?>">
				 </div>
				 <div class="col-4"> </div>
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
						<label>موضوع :</label>
						<input type="text" name="subject" class="form-control" value="<?php echo $r['subject']; ?>">
					</div>
					<div class="col-4"> </div>
					<div class="col-4"> </div>
					<div class="form-group col-4" style="direction:rtl; text-align: right;">
					 <label>سطح طبقه بندی :</label>
           <select name="lev" class="form-control">
						 <option value="">--</option>
						 <option value="محرمانه">محرمانه</option>
						 <option value="فوق محرمانه">فوق محرمانه</option>
						 <option value="سری">سری</option>
						 <option value="به کلی سری">به کلی سری</option>
					 </select>
					</div>
					<div class="col-4"> </div>
					<div class="col-2"> </div>
					<div class="form-group col-8" style="direction:rtl; text-align: right;">
						<label>عکس سند :</label>
						<input type="file" name="pic" id="pic" class="form-control">
					</div>
					<div class="col-2"> </div>
				</div>
				<div class="col-3"> </div>
				<div class="form-group col-6" style="direction:rtl; text-align: right;">
				<button class="btn btn-primary btn-md" style="font:24px b nazanin;" type="submit" onclick="return OnButton1();" name="login"><i>ثبت</i></button>
				</div>
				<div class="col-3"> </div>
			</form>
					<div class="row">
			<div class="col-4"></div>
			<div class="col-1">
			 <input class="btn btn-primary btn-md" type="button" onClick="history.go(-1)" value="بازگشت">
			 </div>
			 <div class="col-7">	</div>
		 </div>

		 <!--اسکریپت تقویم	-->
					<script type="text/javascript">
							$('#input1').change(function() {
									var $this = $(this),
													value = $this.val();
									alert(value);
							});
							$('#textbox1').change(function () {
									var $this = $(this),
													value = $this.val();
									alert(value);
							});
							$('[data-name="disable-button"]').click(function() {
									$('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', true);
							});
							$('[data-name="enable-button"]').click(function () {
									$('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', false);
							});
					</script>

					<script src="../js/jalaali.js" type="text/javascript"></script>
					<script src="../js/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
		</div>
	</body>
</html>
