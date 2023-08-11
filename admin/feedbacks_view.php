<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | FeedBacks</title>
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
    	<h1>Messages</h1>
    </section>


    <div class="header">
        <div class="container">
                <div class="sidenav">
                    <ul>                       
                        <li><a href="category.php">Category</a></li>
                        <li><a href="featuredfood.php">Featured Food</a></li>
                        <li><a href="blogposts.php">Blog Posts</a></li>
                        <li><a href="messages_view.php">Messages</a></li>
                        <li><a href="feedbacks_view.php">Feedbacks</a></li>
                        <li><a href="subscriptions_view.php">Subscriptions</a></li>
                        <li><a href="chefs.php">Chefs</a></li>
                        <li><a href="customers_view.php">Customers</a></li>
                        <br><br><br>
                        <li><a href="logout.php">Logout</a></li>
                   </ul>
             </div>
        </div>
    </div>
    
    
<?php
    $query=mysqli_query($mysqli,"select * from feedback") or die(mysqli_error($mysqli));
    while ($row=mysqli_fetch_array($query)){
        $name=$row['name'];
        $text=$row['text'];
        $item=$row['mfid'];
        $querym=mysqli_query($mysqli,"select * from menu where mid='".$item."'")or die(mysqli_error($mysqli));
        $rowm=mysqli_fetch_array($querym);
        $menu=$rowm['name'];
    
    ?>
    <h4 style=" color:gray; margin:30px 0px 0px 30px">Feedbacks of <?php echo $menu; ?></h4>
    
    <section>
    <div class="tablecontainer">
    <table>
    	<thead><tr>
    		<th>From</th>
    		<th>Text</th>
    	</tr></thead>
    	<tbody>
    		<tr>
    			<td> <?php echo $name;?> </td>
    			<td> <?php echo $text;?> </td>
    		</tr>
    </tbody>
    </table>
    </div>
    </section>
  <?php } ?>
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