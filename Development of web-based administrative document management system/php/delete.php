<?php
  include_once("config.php");
  if(isset($_GET['del']))
  {
    $name=$_GET['del'];
    foreach ($name as $del) {
      $sql="delete from document where num=".$del;
      $qry=mysqli_query($con,$sql);
      if ($qry) {
        echo "<script>alert('سند مورد نظر حذف شد.');
        window.location='delete-document.php';</script>
              <br/>";
      }

    }

  }
 ?>
