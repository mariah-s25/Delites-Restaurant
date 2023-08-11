<?php 
include('dbConnect.php');

$message="";
$id=$_GET['chid'];

mysqli_query($mysqli,"DELETE FROM chef WHERE cid='".$id."'")or die(mysqli_error($mysqli));  

echo "<script type='text/javascript'>alert('The chef has been removed')</script>";
echo "<script>document.location='chefs.php'</script>";
?>