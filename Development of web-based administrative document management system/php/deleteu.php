<?php
  include_once("config.php");
  if(isset($_GET['del']))
  {
    $name=$_GET['del'];
    foreach ($name as $del) {
      $sql="delete from users where userid=".$del;
      $qry=mysqli_query($con,$sql);
      if ($qry) {
        echo "<script>alert('کاربر مورد نظر حذف شد.');
        window.location='delete-user.php';</script>
              <br/>";
      }

    }

  }
 ?>
