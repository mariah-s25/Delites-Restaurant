<?php
include('dbConnect.php');

$id=$_GET['cgidd'];

$querym=mysqli_query($mysqli,"select * from menu where catid='".$id."'")or die(mysqli_error($mysqli));
while ($row=mysqli_fetch_array($querym)){
	$mid=$row['mid'];
	mysqli_query($mysqli,"DELETE FROM menu WHERE mid='".$mid."'")or die(mysqli_error($mysqli));  
}

mysqli_query($mysqli,"DELETE FROM subcategory WHERE sid='".$id."'")or die(mysqli_error($mysqli));  

echo "<script type='text/javascript'>alert('Category has been deleted with its items')</script>";
echo "<script>document.location='category.php'</script>";
?>