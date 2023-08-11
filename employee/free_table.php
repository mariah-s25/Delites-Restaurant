<?php
include('dbConnect.php');

if(isset($_GET['tbl']))
{
    $table=$_GET['tbl'];
    
    $query=mysqli_query($mysqli,"select * from tables where tid = '".$table."'") or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($query);
    $rid=$row['rid'];
    
    mysqli_query($mysqli,"delete from reservation_details where rid='".$rid."'") or die(mysqli_error($mysqli));
    mysqli_query($mysqli,"delete from tables where tid = '".$table."'") or die(mysqli_error($mysqli));
     
 echo "<script type='text/javascript'>alert('Table is released')</script>";
     echo "<script>document.location='tables.php'</script>";
}
else if(isset($_GET['res']))
{
    $rid=$_GET['res'];
    
    $query=mysqli_query($mysqli,"select * from reservation_details where rid = '".$rid."'") or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($query);
    $tid=$row['tid'];
    
     mysqli_query($mysqli,"delete from reservation_details where rid='".$rid."'") or die(mysqli_error($mysqli));
    
    mysqli_query($mysqli,"delete from tables  where tid = '".$tid."'") or die(mysqli_error($mysqli));
   
    echo "<script type='text/javascript'>alert('Table is released')</script>";
     echo "<script>document.location='tables.php'</script>";

}
?>