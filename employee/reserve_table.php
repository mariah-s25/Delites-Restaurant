<?php
include('dbConnect.php');

$msg="";
if(isset($_POST['form-submit'])){
     $persons=$_POST['persons'];
     
     
     $tid=""; 
     $str="0123456789";
 	$limit=3;
 	$i=0;
 	while($i<$limit)
 	{
 	$rand=mt_rand(0,9);
 	$tid.=$str[$rand];
 	$i++;
 	}
     $day=date("l");
     $time=date("H:i:s");
      mysqli_query($mysqli,"INSERT INTO tables (tid,seats,tday,thour,rid,cstid) VALUES('$tid','$persons','$day','$time',NULL,NULL)")or die(mysqli_error($mysqli));  
         
              echo "<script type='text/javascript'>alert('Table is ready')</script>";
     echo "<script>document.location='reserve_table.php'</script>";
}     
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | New Table</title>
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
    	<h1>Reserve New Table</h1>
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
    <div class="primary-button">
        <form method="post"  action="reserve_table.php">
        
        <div style="margin:30px 0px;">
            <div class="col-md-6">  
            <select class="person" name="persons" onchange='this.form.()'>
            <option value="">How many persons?</option>
            <option value="1">1 Person</option>
            <option value="2">2 Persons</option>
            <option value="3">3 Persons</option>
            <option value="4">4 Persons</option>
            <option value="5">5 Persons</option>
            <option value="6">6 Persons</option>
            </select>
            </div>
        </div>
            
        <div class="col-md-6">
            <button type="submit" name="form-submit" id="form-submit" class="btn" style="background-color:#55608f; color:white;">Reserve Table</button>
        </div>
        </form>   
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