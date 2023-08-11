<?php session_start();
include('dbConnect.php');
if(isset($_GET['ctid'])){
$ctid=$_GET['ctid'];
$query=mysqli_query($mysqli,"select * from subcategory where sid='".$ctid."'")or die(mysqli_error($mysqli));
$rowc=mysqli_fetch_array($query);
$cname=$rowc['name'];
$_SESSION['category']=$ctid;
$_SESSION['catname']=$cname;
}
else{
$ctid=$_SESSION['category'];
$cname=$_SESSION['catname'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites | Menu</title>
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
      <h1> <?php echo $cname; ?> Menu</h1>
  </section>
  
  
  <div class="header">
      <div class="container">
          <div class="sidenav">
              <ul style="text-align:left; padding:15px 5px;">  
                  <li><a href="category.php" ><img src="../img/btnPrevious.png" alt="Back" ></a>  </li>
              </ul>
          </div>
      </div>
  </div>
    
    
<section>
    <div class="tablecontainer">
    <table>
    	<thead><tr>
    		<th>Id</th>
    		<th>Name</th>
    		<th>Description</th>
    		<th>Price</th>
    		<th>Picture</th>
    		<th style="width:50px;"></th>
    		<th style="width:50px;"></th>
    	</tr></thead>
    	<tbody>
    		<?php
    			$querym=mysqli_query($mysqli,"select * from menu where catid='".$ctid."'")or die(mysqli_error($mysqli));
    			while($row=mysqli_fetch_array($querym)){
    			$mid=$row['mid'];
    			$name=$row['name'];
    			$desc=$row['descr'];
    			$price=$row['price'];
    			$pic=$row['pic'];
    		?>
    		
    		<tr>
    			<td><?php echo $mid; ?></td>
    			<td><?php echo $name; ?></td>
    			<td><?php echo $desc; ?></td>
    			<td><?php echo $price; ?></td>
    			<td><img src="../img/<?php echo $pic; ?>" height="60px" width="60px"></td>
    			<td style="width:50px;"><a href="menu_delete.php?mid=<?php echo $mid;?>">Delete</a></td>
    			<td style="width:50px;"><a href="menu_update.php?mid=<?php echo $mid;?>">Update</a></td>
    		</tr>
    	<?php } ?>
    </tbody>
    </table>
  </div>    
</section>
   

<section>
    <div class="tablecontainer">
    <form id="form-submit" action="menu_add.php" method="post">
    <table>
    	<thead><tr>
    		<th>Name</th>
    		<th>Price</th>
    		<th>Category</th>
    		<th>Description</th>
    		<th>Picture</th>
    		</tr></thead>
    <tbody>
    	<tr>
    		<td>
    	     <input name="name" type="name" class="form-control" id="name" required="">
    		</td>
    		<td>
    		 <input name="price" type="text" class="form-control" id="price" required="">
    		</td>
    		<td> 			
    		 <input name="catname" type="text" class="form-control" id="Category" required="">   		
    		</td>
    		<td> 			
    		 <input name="description" type="text" class="form-control" id="description" required="">    		 	
    		</td>
    		<td>    		
    		 <input name="picture" type="name" class="form-control" id="picture" required="">    			
    		</td>
    	</tr>
    </tbody>
    </table>
    <div class="col-md-6">
    	<button type="submit" id="form-submit" class="btn" style="margin:15px 25px 25px 25px; background-color:#55608f; color:white;">Add</button>    
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