<?php
session_start();
include('dbConnect.php');

if(!isset($_SESSION['userID'])){
    header('Location:login.php');
}
else{
$msg="";
    $name = $_POST['name'];
    $time = $_POST['hour'];
    $day = $_POST['day'];
    $phone = $_POST['phone'];
    $persons = $_POST['persons'];
    $ctid=$_SESSION['userID'];
	
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$rid="";
	$tid="";
	$limit=10;
	$i=0;
	while($i<$limit)
	{
	    $rand=mt_rand(0,61);
	    $rid.=$string[$rand];
    	$i++;
 	}
 	$str="0123456789";
 	$limit=3;
 	$i=0;
 	while($i<$limit)
 	{
 	$rand=mt_rand(0,9);
 	$tid.=$str[$rand];
 	$i++;
 	}
	
	    mysqli_query($mysqli,"INSERT INTO reservation (rid,rday,rhour,phone,persons,custname,custid) 
	      VALUES('$rid','$day','$time','$phone','$persons','$name','$ctid')")or die(mysqli_error($mysqli));  
	
	mysqli_query($mysqli,"INSERT INTO tables (tid,seats,tday,thour,rid,cstid) VALUES('$tid','$persons','$day','$time','$rid','$ctid')")or die(mysqli_error($mysqli));  
     mysqli_query($mysqli,"INSERT INTO reservation_details(rid,tid) VALUES('$rid','$tid')")or die(mysqli_error($mysqli));  
		
	
	
    	$msg.="Your table is booked for ".$persons." person(s) on ".$day." at ".$time;              
    	
	
	echo "<script type='text/javascript'>alert('".$msg."')</script>";
	echo "<script>document.location='index.php'</script>";
}	
?>