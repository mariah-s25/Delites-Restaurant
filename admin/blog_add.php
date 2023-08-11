<? php 
include('dbConnect.php');

$message="";
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$pic = $_POST['picture'];

$date=date("Y-m-d");
	
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$pid="";
	$limit=10;
	$i=0;
	while($i<$limit)
	{
	$rand=mt_rand(0,61);
	$pid.=$string[$rand];
	$i++;
	}

	mysqli_query($mysqli,"INSERT INTO blogpost(bid,title,author,content,bpic,date) 
	  VALUES('$pid','$title','$author','$content','$pic','$date')")or die(mysqli_error($mysqli));  
	$message.="The post has been added with id=".$id;
	
	echo "<script type='text/javascript'>alert('".$message."')</script>";
	echo "<script>document.location='blogposts.php'</script>";
?>