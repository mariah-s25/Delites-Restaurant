<?php
include('dbConnect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Blog</title>
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
    	<h1>Blog Posts</h1>
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
    
<section>
    <div class="tablecontainer">
    <table>
    	<thead><tr>
    		<th>Id</th>
    		<th>Title</th>
    		<th>Author</th>
    		<th>Date</th>
    		<th>Picture</th>
    		<th>Content</th>
    		<th style="width:50px;"></th>
    		<th style="width:50px;"></th>
    	</tr></thead>
    	<tbody>
    		<?php
    			$query=mysqli_query($mysqli,"select * from blogpost")or die(mysqli_error($mysqli));
    			while ($row=mysqli_fetch_array($query)){
    			$bid=$row['bid'];
    			$date=$row['date'];
    			$title=$row['title'];
    			$bpic=$row['bpic'];
    			$author=$row['author'];
    			$content=$row['content'];
    			$str=substr($content,0,30);
    		?>
    		<tr>
    			<td><?php echo $bid; ?></td>
    			<td><?php echo $title; ?></a></td>
    			<td><?php echo $author; ?></td>
    			<td><?php echo $date; ?></td>
    			<td><?php echo $bpic; ?></a></td>
    			<td><?php echo $str; ?></td>
    			<td style="width:50px;"><a href="blog_delete.php?bpid=<?php echo $bid;?>">Delete</a></td>
    			<td style="width:50px;"><a href="blog_update.php?bpid=<?php echo $bid;?>">Update</a></td>
    		</tr>
    	<?php } ?>
    </tbody>
    </table>
    </div>
</section>
    
<section>
    <div class="tablecontainer">
    <form id="form-submit" action="blog_add.php" method="post">
    <table>
        <thead><tr>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>Picture</th>
        </tr></thead>
        <tbody>
             <tr>
                  <td>
                       <input name="title" type="text" class="form-control" id="title" required=""> 
                  </td>
                  <td>
                      <input name="author" type="name" class="form-control" id="author" required="">
                  </td>
                  <td>
                      <input name="content" type="text" class="form-control" id="content" placeholder="Content" required="">
                  </td>
                  <td>
                      <input name="picture" type="name" class="form-control" id="picture" placeholder="Picture Path" required="">
                  </td>
              </tr>
        </tbody>
    </table>
    <div class="col-md-6">
        <button type="submit" name="form-submit" id="form-submit" class="btn" style="margin:15px 25px 25px 25px; padding:10px 10px; background-color:#55608f; color:white;">Add</button>
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