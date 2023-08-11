<?php 
include('dbConnect.php');


$message="";
$fname = $_POST['name'];
$fdesc = $_POST['description'];
$fprice = $_POST['price'];
$fpic = $_POST['picture'];
	
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$fid="";
	$limit=10;
	$i=0;
	while($i<$limit)
	{
	$rand=mt_rand(0,61);
	$fid.=$string[$rand];
	$i++;
	}
		
	mysqli_query($mysqli,"INSERT INTO featuredfood (fid,fname,fdesc,fprice,fpic) VALUES('$fid','$fname','$fdesc','$fprice','$fpic')")or die(mysqli_error($mysqli));  
	$message.="The item has been added as featured food with id=".$fid;
	
	echo "<script type='text/javascript'>alert('".$message."')</script>";
	echo "<script>document.location='featuredfood.php'</script>";
?>