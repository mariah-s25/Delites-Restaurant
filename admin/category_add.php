<?php 
include('dbConnect.php');

$name = $_POST['name'];
$pic = $_POST['picture'];
	
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$id="";
	$limit=10;
	$i=0;
	while($i<$limit)
	{
	$rand=mt_rand(0,61);
	$id.=$string[$rand];
	$i++;
	}

	mysqli_query($mysqli,"INSERT INTO subcategory(sid,name,pic) VALUES('$id','$name','$pic')")or die(mysqli_error($mysqli));  
	
	echo "<script type='text/javascript'>alert('The category has been added with id=".$id."')</script>";
	echo "<script>document.location='category.php'</script>";
?>