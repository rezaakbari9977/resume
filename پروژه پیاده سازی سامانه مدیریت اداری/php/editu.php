<?php
		   //چک کردن دیتا بیس و اضافه کردن اطلاعات
			include_once('config.php');
			$id=$_GET['id'];
		   if(!isset($_POST['pass']) or empty($_POST['pass']) or
			!isset($_POST['rpass']) or empty($_POST['rpass']))
		   {
		     echo "<script type='text/javascript'>
		      alert('گذرواژه وارد نشده است.');
		      window.location='forgot.php';
		      </script>";
		      exit;
		   }
		   if($_POST['pass']!=$_POST['rpass'])
		   {
		     echo "<script type='text/javascript'>
		      alert('گذرواژه تکرار شده تطابق ندارد.');
		      window.location='forgot.php';
		      </script>";
		      exit;
		   }
			$pass=$_POST['pass'];
	   	   $sql="update users set pass=".$_POST['pass']." where userid=".$_GET['id'];
		   if(!mysqli_query($con,$sql))
		   {
  		 		echo "<script type='text/javascript'>
		      alert('اطلاعات در بانک اطلاعاتی ثبت نگردید.');
		      window.location='forgot.php';</script>
		      </script>";
		     exit;
		   }
		   else {
		     echo "<script type='text/javascript'>
		      alert('اطلاعات در بانک اطلاعاتی ثبت گردید.');
		      window.location='index.php';</script>
		      </script>";
		     }
		     mysqli_close($con);
?>
