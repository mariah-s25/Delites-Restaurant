<?php
session_start();
include('dbConnect.php');
    if(!isset($_SESSION['userID']))
    {
        echo "<script type='text/javascript'>alert('You need to login in first')</script>";
        echo "<script>document.location='menu.php'</script>";
    }
    $mid = $_GET['menu'];
    $cust=$_SESSION['userID'];
    $query=mysqli_query($mysqli,"select * from orders where ctid='".$cust."'");
    if($row=mysqli_fetch_array($query)){
         $ordr=$row['oid'];
         $querym=mysqli_query($mysqli,"select * from orders_items where orid='".$ordr."' and mrid='".$mid."'")or die(mysqli_error($mysqli));

         if($rowm=mysqli_fetch_array($querym)){
             mysqli_query($mysqli,"update orders_items set quantity=quantity+1 where orid='".$ordr."' and mrid='".$mid."'")or die(mysqli_error($mysqli));
            
         }else {  
             mysqli_query($mysqli,"insert into orders_items (orid,mrid,quantity) values ('$ordr','$mid','1')")or die(mysqli_error($mysqli));
          }  
         echo "<script type='text/javascript'>alert(' Order Added!')</script>";
         echo "<script>document.location='menu.php'</script>";
     }
     else{
       echo "<script type='text/javascript'>alert('Start a New Order First!')</script>";
       echo "<script>document.location='menu.php'</script>";
       
     }
?>