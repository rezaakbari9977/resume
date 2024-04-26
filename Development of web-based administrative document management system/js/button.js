function OnButton1()
{
  document.form.action = "../php/add-d.php";
  document.form.target = "iframe1";
  document.form.submit();
  document.form.action = "../php/uploadf.php";
  document.form.target = "iframe2";
  document.form.submit();
  return true;
}
