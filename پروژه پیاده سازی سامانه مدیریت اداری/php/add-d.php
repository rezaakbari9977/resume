<?php
  include_once("config.php");
  //بررسی عکس
  $target_dir = "../file/";
  $target_file = $target_dir . basename($_FILES["pic"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["pic"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          echo "<script>alert('فایل مورد نظر اشتباه است.');</script>";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
          echo "<script>alert('فایل مورد نظر موجود میباشد.');</script>";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["pic"]["size"] > 10000000) {
          echo "<script>alert('فایل مورد نظر بیش از اندازه بزرگ است.');</script>";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "pdf" ) {
          echo "<script>alert('فرمت فایل مورد نظر اشتباه است.');</script>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
          echo "<script>alert('متاسفانه فایل آپلود نشد.');
                window.location='add-document.php';</script>";
          exit;
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {

      } else {
          echo "<script>alert('خطا در ارسال فایل');
                window.location='add-document.php';</script>";
          exit;
      }
  }
  //چک کردن دیتا بیس و اضافه کردن اطلاعات
  if(!isset($_POST['num']) or empty($_POST['num']))
  {
    echo "<script type='text/javascript'>
     alert('شماره سند وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_POST['sender']) or empty($_POST['sender']))
  {
    echo "<script type='text/javascript'>
     alert('فرستنده وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_POST['reciver']) or empty($_POST['reciver']))
  {
    echo "<script type='text/javascript'>
     alert('گیرنده وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_POST['subject']) or empty($_POST['subject']))
  {
    echo "<script type='text/javascript'>
     alert('موضوع وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_POST['date']) or empty($_POST['date']))
  {
    echo "<script type='text/javascript'>
     alert('تاریخ وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_POST['lev']) or empty($_POST['lev']))
  {
    echo "<script type='text/javascript'>
     alert('سطح طبقه بندی وارد نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  if(!isset($_FILES['pic']) or empty($_FILES['pic']))
  {
    echo "<script type='text/javascript'>
     alert('عکس سند اضافه نشده است.');
     window.location='add-document.php';
     </script>";
     exit;
  }
  $num=$_POST['num'];
  $date=$_POST['date'];
  $sender=$_POST['sender'];
  $reciver=$_POST['reciver'];
  $subject=$_POST['subject'];
  $lev=$_POST['lev'];
  $sql="insert into document values(".$num.",'".$date."','".$sender."','".$reciver."','".$subject."','".$lev."','".$target_file."')";
  $qry=mysqli_query($con,$sql);
  if(!$qry){
    echo "<script type='text/javascript'>
     alert('اطلاعات در بانک اطلاعاتی ثبت نگردید.');
     window.location='add-document.php';</script>
     </script>";
    exit;
  }
  else {
    echo "<script type='text/javascript'>
     alert('اطلاعات در بانک اطلاعاتی ثبت گردید.');
     window.location='add-document.php';</script>
     </script>";
   }
    mysqli_close($con);
 ?>
