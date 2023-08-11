<?php 
include('dbConnect.php');

$message="";
$id=$_GET['mid'];

mysqli_query($mysqli,"DELETE FROM menu WHERE mid='".$id."'")or die(mysqli_error($mysqli));  

echo "<script type='text/javascript'>alert('The item has been deleted')</script>";
echo "<script>document.location='menu_items.php'</script>";
?>	