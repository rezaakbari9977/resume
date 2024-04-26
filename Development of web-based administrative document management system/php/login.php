<?php
  session_start();
  if(isset($_POST['userid']) and isset($_POST['pass']))
  {
    include_once("config.php");
    $sql="SELECT * FROM users WHERE
    userid='".$_POST['userid']."' and pass='".$_POST['pass']."'";
    $qry=mysqli_query($con,$sql);
	$r=mysqli_fetch_array($qry);
    $num=mysqli_num_rows($qry);
    if($num>0)
    {
      if ($r['type']==0)
       {
      $_SESSION['user']=$_POST['userid'];
      header("location:user.php");
      }
      elseif ($r['type']==1) {
      $_SESSION['user']=$_POST['userid'];
      header("location:boss.php");
      }
      elseif ($r['type']==2) {
        $_SESSION['user']=$_POST['userid'];
        header("location:admin.php");
      }
    }
    else {
      echo "<script type='text/javascript'>
      alert('نام کاربری یا پسورد اشتباه میباشد.');
      window.location='index.php';
      </script>";
      }

  }
 ?>
