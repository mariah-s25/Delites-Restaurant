<?php 
include('dbConnect.php');

    $id=$_GET['resid'];
    
	mysqli_query($mysqli,"DELETE FROM reservation WHERE rid='".$id."'")or die(mysqli_error($mysqli));  

    mysqli_query($mysqli,"DELETE FROM reservation_details WHERE rid='".$id."'")or die(mysqli_error($mysqli));  

	mysqli_query($mysqli,"DELETE FROM tables where rid='".$id) or die(mysqli_error($mysqli));


    echo "<script type='text/javascript'>alert('The reservation has been deleted')</script>";
    echo "<script>document.location='reservations.php'</script>";
}	
?>