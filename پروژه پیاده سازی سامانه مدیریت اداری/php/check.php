<?php
  session_start();
  if(isset($_POST['userid']) and isset($_POST['id']))
  {
    include_once("config.php");
    $sql="SELECT * FROM users WHERE
    userid='".$_POST['userid']."' and id='".$_POST['id']."'";
    $qry=mysqli_query($con,$sql);
    $r=mysqli_fetch_array($qry);
    $num=mysqli_num_rows($qry);
    if($num>0)
    {
      header("location: edit-pass.php?edit=".$r['userid']."");
    }
    else {
      echo "<script type='text/javascript'>
      alert('نام کاربری یا شماره ملی اشتباه میباشد.');
      window.location='forget.php';
      </script>";
      }

  }
 ?>
