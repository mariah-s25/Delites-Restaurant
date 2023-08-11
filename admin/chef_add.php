<?php 
include('dbConnect.php');

$message="";
$name = $_POST['name'];
$rank = $_POST['rank'];
$pic = $_POST['picture'];

	
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$cid="";
	$limit=10;
	$i=0;
	while($i<$limit)
	{
	$rand=mt_rand(0,61);
	$cid.=$string[$rand];
	$i++;
	}

	mysqli_query($mysqli,"INSERT INTO chef(cid,name,rank,pic) 
	  VALUES('$cid','$name','$rank','$pic')")or die(mysqli_error($mysqli));  
	$message.="Chef ".$name." has been added with id ".$cid;
	
	echo "<script type='text/javascript'>alert('".$message."')</script>";
	echo "<script>document.location='chefs.php'</script>";
?>