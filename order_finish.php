<?php
session_start();
include('dbConnect.php');

if(!isset($_SESSION['userID'])) {  //not logged in
     header('Location:login.php');
}
$cust=$_SESSION['userID'];
$query=mysqli_query($mysqli,"select * from orders where ctid='".$cust."'")or die(mysqli_error($mysqli));
$row=mysqli_fetch_array($query);
$order=$row['oid'];

if(isset($_GET['itemadd'])){
     $mid=$_GET['itemadd'];
     $querym=mysqli_query($mysqli,"update orders_items set quantity=quantity+1 where orid='".$order."' and mrid='".$mid."'")or die(mysqli_error($mysqli));
}
else if(isset($_GET['itemdelete'])){
     $mid=$_GET['itemdelete'];
     $querym=mysqli_query($mysqli,"update orders_items set quantity=quantity-1 where orid='".$order."' and mrid='".$mid."'")or die(mysqli_error($mysqli));
}
            
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Order</title>
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
                <!--/.navbar-header-->
                </div>
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    
    
<section>
<h4> Your Order</h4>
<form method="post" id="form-submit" action="order_confirm.php">
    <div class="tablecontainer">
        <table style="width:90%;">
        <thead><tr>
        <th>Menu Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th style="width:50px;"></th>
        <th style="width:50px;"></th>
        <th>Total</th>
        </tr></thead>
        <tbody>
        <?php
            $cust=$_SESSION['userID'];
            $query=mysqli_query($mysqli,"select * from orders where ctid='".$cust."'")or die(mysqli_error($mysqli));
            $row=mysqli_fetch_array($query);
            $order=$row['oid'];
               
            $sum=0;
            $querym=mysqli_query($mysqli,"select * from orders_items where orid='".$order."'")or die(mysqli_error($mysqli));
            while($rowm=mysqli_fetch_array($querym)){
            $item=$rowm['mrid'];
            $quantity=$rowm['quantity'];
           
            $queryn=mysqli_query($mysqli,"select * from menu where mid='".$item."'")or die(mysqli_error($mysqli));
            $rown=mysqli_fetch_array($queryn);
               $name=$rown['name'];
               $pr=$rown['price'];
               $pr=intval($pr);
               $totalprice = bcmul($quantity , $pr);
               $sum = $sum + $totalprice;
            ?>
              <tr>
    			        <td><?php echo $name; ?></td>
    			        <td><?php echo $quantity; ?></a></td>
    			        <td><?php echo $totalprice.",000 L.L"; ?></td>
    			        <td style="width:50px;"><a href="order_finish.php?itemadd=<?php echo $item; ?>">Add</a></td>
    			        <td style="width:50px;"><a href="order_finish.php?itemdelete=<?php echo $item;?>">Delete</a></td>
    		   </tr>
    	    <?php }  ?>
    	    <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td><?php echo $sum.",000 L.L"; ?></td> </tr>
    </tbody>
    </table>
    </div>
    
    <div class="col-md-6">
        <button type="submit" name="confirm" id="form-submit" class="btn" style="margin:40px;">Confirm Order</button>
    </div>
    <div class="col-md-6">
    <button type="submit" name="back" id="form-submit" class="btn" style="margin:40px;">Back to menu</button>
    </div>
    <div class="col-md-6">
        <button type="submit" name="cancel" id="form-submit" class="btn" style="margin:40px;">Cancel Order</button>
    </div>
</form>   
</section>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; 2023 Delites Restaurant</p>
                </div>
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