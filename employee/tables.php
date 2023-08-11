<?php
 include('dbConnect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Tables</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/fontAwesome.css">
        <link rel="stylesheet" href="../css/hero-slider.css">
        <link rel="stylesheet" href="../css/owl-carousel.css">
        <link rel="stylesheet" href="../css/templatemo-style.css">
        <link rel="stylesheet" href="../css/Tablestyle.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

  <body style="margin-left:25%; width:75%">          
  
  <section class="abanner">
      <h1>Tables</h1>
  </section>
  
  
<div class="header">
    <div class="container">
        <div class="sidenav">
            <ul>  
                <li><a href="orders_view.php">Orders</a></li>                     
                <li><a href="reservations_view.php">Reservations</a></li>
                <li><a href="tables.php">Tables</a></li> 
                <br><li><a href="reserve_table.php">Reserve New Table</a></li>
                <br><br><br>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

    
    <section>
    <h5 style=" color:gray; margin:40px 0px 40px 40px"><?php echo date("Y-m-d"); ?></h5>
    <div> <a href="tables_view_all.php">View All </a></div>
    
    <div class="tablecontainer">
    <h2>Reserved Tables</h2>
    <table>
    	<thead><tr>
    		<th>Table</th>
    		<th>Time</th>
    		<th>No. of seats</th>
    		<th>Reservation</th>
    		<th>Reserved for</th>
    		<th></th>
    	</tr></thead>
    	<tbody>
    		    <?php 
    		    $query=mysqli_query($mysqli,"select * from tables where tday='".date("l")."'") or die(mysqli_error($mysqli));
    		    while($row=mysqli_fetch_array($query)){
               
    		        $tid=$row['tid'];  
    		        $time=$row['thour'];
    		        $rid=$row['rid'];
    		        $seats=$row['seats'];
    		        
    		        $rquery=mysqli_query($mysqli,"select * from reservation where rid = '".$rid."'") or die(mysqli_error($mysqli));
    		        $rrow=mysqli_fetch_array($rquery);
    		        $name=$rrow['custname'];
    			 ?>  
                 <tr>
    			    <td> <?php echo $tid; ?> </td>
    			    <td> <?php echo $time; ?> </td>
    			    <td> <?php echo $seats;?> </td>
    			    <td> <?php echo $rid; ?> </td>
    			    <td> <?php echo $name; ?> </td>
    			    <td> <a href="free_table.php?tbl=<?php echo $tid; ?>"> attended </a> </td>
    			</tr>
    			<?php  } ?>
    </tbody>
    </table>
    </div>
    </section>
    
    

    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    
    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
    
    </html>