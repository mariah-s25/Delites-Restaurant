<?php
include('dbConnect.php');
session_start();

if(isset($_GET['new']))
{
    if(!isset($_SESSION['userID'])) //if not logged in
    {
        header('Location:login.php');
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
    	$cust=$_SESSION['userID'];
    	$d=date("Y-m-d");
        $t=date("H:i:s");
    	mysqli_query($mysqli,"insert into orders (oid,ctid,oday,ohour) values ('$id','$cust','$d','$t')")or die(mysqli_error($mysqli));
     echo "<script type='text/javascript'>alert('You can start ordering')</script>";
       echo "<script>document.location='menu.php'</script>";
           	 
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Our Menus</title>
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
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Our Menus</a></li>
                        <li><a href="blog.php">Blog Entries</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="reservations.php">My Reservations</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    


    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Menus</h1>
                    <p>The passion for food sets the foundations of our place's menu</p>
                </div>
            </div>
        </div>
    </section>
    
    <section>
    <div class="primary-button" style="text-align:center; margin:40px;">
        <a href="menu.php?new='1'" >Start a New Order</a>
    </div>
    </section>

<?php
    include('dbConnect.php');
    $query=mysqli_query($mysqli,"select * from subcategory")or die(mysqli_error($mysqli));
    while ($row=mysqli_fetch_array($query)){
        $subcat_id=$row['sid'];
        $subcat_name=$row['name'];
        $subcat_pic=$row['pic'];
?>

<h2 style=" color:gray; margin:40px 0px 0px 40px"><?php echo $subcat_name; ?></h2>
<?php  
    $querym=mysqli_query($mysqli,"select * from menu where catid='$subcat_id'")or die(mysqli_error($mysqli));
    while ($rowm=mysqli_fetch_array($querym)){
    $mid=$rowm['mid'];
    $menu=$rowm['name'];
    $desc=$rowm['descr'];
    $price=$rowm['price'];
    $pic=$rowm['pic'];
?>
<section class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="menu-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="left-image">
                                <img src="img/<?php echo $pic; ?>" alt="<?php echo $menu; ?>">                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2><?php echo $menu; ?></h2>                                
                             <div class="owl" class="owl-carousel owl-theme">               
                                 <div class="item col-md-12">
                                     <div class="food-item">
                                         <div class="price" style="margin-top:30px;"><?php echo $price; ?></div>
                                             <div><p><?php echo $desc; ?></p></div>
                                         </div>
                                     </div>
                                 </div>
                            </div>
                            <div align="center">
                                <a href="feedback.php?item=<?php echo $menu;?>"> View Feedbacks </a>
                            </div>
                        </div>
                        <div class="primary-button" style="text-align:center; margin-top:30px;">
                            <a href="order_save.php?menu=<?php echo $mid;?>" >Add to order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php } ?>

<section>
    <div class="primary-button" style="text-align:center; margin-top:50px;">
        <a href="order_finish.php">Finish Order</a>
    </div>
</section>



<section class="get-app" style="margin:25px 35px;" >
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Meet our team - The Masterminds...</h2>
            </div>
        </div>
    </div>
</section>

<section class="services">
        <div class="container">
            <div class="row">
            
            <?php
            $query=mysqli_query($mysqli,"select * from chef")or die(mysqli_error($mysqli));
            while ($row=mysqli_fetch_array($query)){
            $chefname=$row['name'];
            $chefrank=$row['rank'];
            $chefpic=$row['pic'];
            ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/<?php echo $chefpic; ?>" alt="">
                        <h4><?php echo $chefname; ?></h4>
                        <h5><?php echo $chefrank; ?></h5>
                        </a>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
    </section>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; 2023 Delites Restaurant</p>
                </div>
                <div> <a href="logout.php">Logout</a> </div>
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>	-->
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