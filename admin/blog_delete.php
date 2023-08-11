<? php 

include('dbConnect.php');

$message="";
$id=$_GET['bpid'];

mysqli_query($mysqli,"DELETE FROM blogpost WHERE bid='".$id."'")or die(mysqli_error($mysqli));  

echo "<script type='text/javascript'>alert('The blog has been deleted')</script>";
echo "<script>document.location='blogposts.php'</script>";
?>