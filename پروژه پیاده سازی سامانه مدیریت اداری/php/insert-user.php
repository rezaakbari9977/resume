<?php
  include_once("config.php");
  if(!isset($_POST['userid']) or empty($_POST['userid']))
  {
    echo "<script type='text/javascript'>
     alert('شماره کاربری وارد نشده است.');
	 window.location='register.php';
     </script>";
     exit;
  }
  if(!isset($_POST['pass']) or empty($_POST['pass']))
  {
    echo "<script type='text/javascript'>
     alert('گذرواژه وارد نشده است.')
     </script>";
     exit;
  }
  $userid=$_POST['userid'];
  $name=$_POST['name'];
  $pass=$_POST['pass'];
  $id=$_POST['id'];
  $type=$_POST['type'];
  $sql="insert into users values('".$name."',$userid,$pass,$id,$type)";
  if(!mysqli_query($con,$sql))
  {
    echo "<script type='text/javascript'>
     alert('اطلاعات در بانک اطلاعاتی ثبت نگردید.');
     window.location='register.php';</script>
     </script>";
    exit;
  }
  else {
    echo "<script type='text/javascript'>
     alert('اطلاعات در بانک اطلاعاتی ثبت گردید.');
     window.location='register.php';</script>
     </script>";
    }
    mysqli_close($con);
 ?>
