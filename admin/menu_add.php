<?php 
include('dbConnect.php');


$message="";
$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
$pic = $_POST['picture'];
$catname = $_POST['catname'];
	
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


	$query=mysqli_query($mysqli,"SELECT * FROM subcategory where name='".$catname."'")or die(mysqli_error($mysqli));  
	$row=mysqli_fetch_array($query);
	$catid=$row['sid'];
		
	mysqli_query($mysqli,"INSERT INTO menu(mid,name,descr,price,pic,catid) VALUES('$id','$name','$desc','$price','$pic','$catid')")or die(mysqli_error($mysqli));  
	$message.="The item has been added to ".$catname." menu with id=".$id;
	
	echo "<script type='text/javascript'>alert('".$message."')</script>";
	echo "<script>document.location='menu_items.php'</script>";
	?>