<?php
session_start();
include('dbConnect.php');
$msg="";
if(isset($_POST['back'])){
    echo "<script type='text/javascript'>alert('Add more dishes to your order!')</script>";
echo "<script>document.location='menu.php'</script>";


}
else if(isset($_POST['confirm'])){
    echo "<script type='text/javascript'>alert('You order is confirmed')</script>";
echo "<script>document.location='menu.php'</script>";


}
else if(isset($_POST['cancel'])){
       $cid=$_SESSION['userID'];
    $query=mysqli_query($mysqli,"select * from orders where ctid='".$cid."'")or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($query);
    $order=$row['oid'];
    mysqli_query($mysqli,"delete orders_items where orid='".$order."'")or die(mysqli_error($mysqli));

echo "<script type='text/javascript'>alert('Your order is cancelled ')</script>";
echo "<script>document.location='menu.php'</script>";
}
?>