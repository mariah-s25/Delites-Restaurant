<?php 
include('dbConnect.php');
session_start();
$message=""; 
if(isset($_GET['rid'])){
    $rid = $_GET['rid'];
    $_SESSION['rsid']=$rid;
}
if(isset($_POST['submit']))
{
    $rid=$_SESSION['rsid'];
    $ctid=$_SESSION['userID'];
    $query=mysqli_query($mysqli,"select * from reservation_details where rid='".$rid."'")or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($query);
    $tid=$row['tid'];
    
    $time = $_POST['hour'];
    $day = $_POST['day'];
    $persons = $_POST['persons'];
    $persons = intval($persons);
	
    	mysqli_query($mysqli,"Update tables SET tday='".$day."' thour='".$time."' seats='".$persons."' where tid='".$tid."'")or die(mysqli_error($mysqli));  
	
    	mysqli_query($mysqli,"UPDATE reservation SET rday='".$day."' rhour='".$time."' persons='".$persons."'WHERE rid='".$rid."'")or die(mysqli_error($mysqli)); 

    	$message.="The reservation has been updated";

    echo "<script type='text/javascript'>alert('".$message."')</script>";
    echo "<script>document.location='reservations.php'</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Your Reservations</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/Tablestyle.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <a href="index.php" class="navbar-brand scroll-top">Delites</a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div  style="text-align:left; padding:15px 5px;">  
                    <a href="index.php" ><img src="img/close.png" alt="Cancel" ></a>       
                </div>
            </nav>
        </div>
    </div>
    
    
<section id="book-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Change a reservation</h2>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="right-info">
                    <form id="form-submit" action="reservation_update.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                            	<fieldset>
                            		<select required name='day' onchange='this.form.()'>
                            			<option value="">Select day</option>
                            			<option value="Monday">Monday</option>
                            			<option value="Tuesday">Tuesday</option>
                            			<option value="Wednesday">Wednesday</option>
                            			<option value="Thursday">Thursday</option>
                            			<option value="Friday">Friday</option>
                            			<option value="Saturday">Saturday</option>
                            			<option value="Sunday">Sunday</option>
                            		</select>
                            	</fieldset>
                            </div>
                            <div class="col-md-6">
                            	<fieldset>
                            		<select required name='hour' onchange='this.form.()'>
                            			<option value="">Select hour</option>
                            			<option value="10:00:00">10:00</option>
                            			<option value="12:00:00">12:00</option>
                            			<option value="14:00:00">14:00</option>
                            			<option value="16:00:00">16:00</option>
                            			<option value="18:00:00">18:00</option>
                            			<option value="20:00:00">20:00</option>     
                            		</select>
                            	</fieldset>
                            </div>
                            <div class="col-md-6">
                            	<fieldset>
                            		<select required class="person" name='persons' onchange='this.form.()'>
                            			<option value="">How many persons?</option>
                            			<option value="1">1 Person</option>
                            			<option value="2">2 Persons</option>
                            			<option value="3">3 Persons</option>
                            			<option value="4">4 Persons</option>
                            			<option value="5">5 Persons</option>
                            			<option value="6">6 Persons</option>
                            		</select>
                            	</fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <button type="submit" name="submit" id="form-submit" class="btn">Update</button>
                                </fieldset>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Copyright &copy; 2023 Delites Restaurant</p>
            </div>
            <div class="col-md-4">
                <ul class="social-icons">
                    <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p>Thanks for your visit!</p>
            </div>
        </div>
    </div>
</footer>
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