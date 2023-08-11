<?php 
include('dbConnect.php');
session_start();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $npass=$_POST['npassword'];
    
    if($pass!=$npass){ 
        echo "<script type='text/javascript'>alert('Incorrect Password!')</script>";
	echo "<script>document.location='login_new.php'</script>";
      exit();
    }
    
    $query=mysqli_query($mysqli,"select * from customer where username='".$username."'")or die(mysqli_error($mysqli));
    
   if($row=mysqli_fetch_array($query)){ 
       echo "<script type='text/javascript'>alert('Username already exists')</script>";
	echo "<script>document.location='login_new.php'</script>";
     exit();
   }
    
   else{
        $string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $id="";
        $limit=10;
        $i=0;
        while($i<$limit)
        {
            $rand=mt_rand(0,61);
            $id.=$string[$rand];
            $i++;
        }

        
        mysqli_query($mysqli,"INSERT INTO customer (custid,name,email,phone,username,password)
         values ('$id','$name','$email','$phone','$username','$pass')")or die(mysqli_error($mysqli));

       $_SESSION['userID']=$id;
       echo "<script type='text/javascript'>alert('Your account is created')</script>";
	echo "<script>document.location='index.php'</script>";

    }
}
 ?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
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
                    <a href="index.php" ><img src="img/btnPrevious.png" alt="Back" ></a>       
                </div>
            </nav>
        </div>
    </div>
   <body>
   
   <section id="book-table">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="heading">
                       <h2></h2>
                   </div>
               </div>
               <div class="col-md-4 col-md-offset-2 col-sm-12">
                   <div class="left-image">
                       <img src="img/book_left_image.jpg" alt="">
                   </div>
               </div>
               <div class="col-md-4 col-sm-12">
                   <div class="right-info">
                       <h4>Register</h4>
                       <form id="form-submit" action="login_new.php" method="post">
                           <div class="row">
                               <div class="col-md-6">
                                   <fieldset>
                                       <input name="name" type="name" class="form-control" id="name" placeholder="Full name" required="">
                                   </fieldset> 
                               </div>
                               <div class="col-md-6">
                                   <fieldset>
                                       <input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
                                   </fieldset> 
                               </div>
                               <div class="col-md-6">
                                   <fieldset>
                                       <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number" required="">
                                   </fieldset> 
                               </div>         
                               <div class="col-md-6">
                               	  <fieldset>
                             		  <input name="username" type="text" class="form-control" id="username" placeholder="Username" required="">
                             	  </fieldset> 
                               </div>
                               <div class="col-md-6">
                            	   <fieldset>
                            		   <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
                            	   </fieldset> 
                               </div>        
                               <div class="col-md-6">
                              	   <fieldset>
                            		   <input name="npassword" type="password" class="form-control" id="npassword" placeholder="Confirm Password" required="">
                            	   </fieldset> 
                               </div>
                               <div class="col-md-6">
                                   <fieldset>
                                       <button type="submit" name="submit" id="form-submit" class="btn">Register</button>
                                   </fieldset>
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
</body>
</html>