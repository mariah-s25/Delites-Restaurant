<?php
include('dbConnect.php');
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$msg = $_POST['message'];
	$date=date("Y-m-d");
	
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

    mysqli_query($mysqli,"INSERT INTO message(mesid,name,email,phone,text,date) 
			VALUES('$id','$name','$email','$phone','$msg','$date')")or die(mysqli_error($mysqli));  
    
    echo "<script type='text/javascript'>alert('Thanks for your message')</script>";
    echo "<script>document.location='contact.php'</script>";
    
?>