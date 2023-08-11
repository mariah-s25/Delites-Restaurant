<?php 
include('dbConnect.php');

$message="";
$fid=$_GET['ffid'];

mysqli_query($mysqli,"DELETE FROM featuredfood WHERE fid='".$fid."'")or die(mysqli_error($mysqli));  

echo "<script type='text/javascript'>alert('The food has been deleted')</script>";
echo "<script>document.location='featuredfood.php'</script>";
?>