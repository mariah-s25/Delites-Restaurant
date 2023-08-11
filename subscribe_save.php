<?php
include('dbConnect.php');

$subs="";
	
$email = $_POST['email'];

$query=mysqli_query($mysqli,"select * from subscribed where email='".$email."'")or die(mysqli_error($mysqli));
if($row=mysqli_fetch_array($query)){
    $subs.="This email has already subscribed";
}
else{
mysqli_query($mysqli,"INSERT INTO subscribed(email) VALUES('$email')")or die(mysqli_error($mysqli));  

$subs.="Thanks for subscribing..You can now receive our latest blogs";
}

echo "<script type='text/javascript'>alert('".$subs."')</script>";
echo "<script>document.location='blog.php'</script>";
?>