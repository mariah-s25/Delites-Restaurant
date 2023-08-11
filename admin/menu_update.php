<?php 
include('dbConnect.php');
session_start();
$message="";
if(isset($_GET['mid'])){
    $id=$_GET['mid'];
    $_SESSION['menu']=$id;

$mquery=mysqli_query($mysqli,"select * from menu where mid='".$id."'")or die(mysqli_error($mysqli));
$mrow=mysqli_fetch_array($mquery);
$mname=$mrow['name'];
$desc=$mrow['descr'];
$price=$mrow['price'];
$pic=$mrow['pic'];
$cid=$mrow['catid'];

$query=mysqli_query($mysqli,"select * from subcategory where sid='".$cid."'")or die(mysqli_error($mysqli));
$row=mysqli_fetch_array($query);
$ctname=$row['name'];
}
if(isset($_POST['submit']))
{
$id=$_SESSION['menu'];
$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
$pic = $_POST['picture'];
$catname =$_POST['catname'];

$query=mysqli_query($mysqli,"select * from subcategory where name='".$catname."'")or die(mysqli_error($mysqli));
$row=mysqli_fetch_array($query);
$catid=$row['sid'];

mysqli_query($mysqli,"UPDATE menu SET name='".$name."' descr='".$desc."' price='".$price."' pic='".$pic."' catid='".$catid."' WHERE mid='".$id."'")or die(mysqli_error($mysqli));  


echo "<script type='text/javascript'>alert('The item has been updated')</script>";
echo "<script>document.location='menu_items.php'</script>";
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
      <h1>Update <?php echo $mname; ?></h1>
  </section>
  
  
  <div class="header">
      <div class="container">
          <div class="sidenav">
              <ul style="text-align:left; padding:15px 5px;">  
                  <li><a href="menu_items.php" ><img src="../img/close.png" alt="Cancel" ></a>  </li>
              </ul>
          </div>
      </div>
    </div>
    
 
    
    <section>
    <div class="tablecontainer">
    <form id="form-submit" action="menu_update.php" method="post">
    <table>
        <thead><tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Picture</th>
        </tr></thead>
        <tbody>
            <tr>
                <td><?php echo $id; ?></td>
                <td>    
                 <input name="name" type="name" class="form-control" id="name" placeholder="<?php echo $mname; ?>" required="">   
                </td>
                <td> 
                 <input name="price" type="text" class="form-control" id="price" placeholder="<?php echo $price; ?>" required="">   
                </td>
                <td>   
                 <input name="catname" type="text" class="form-control" id="Category" placeholder="<?php echo $ctname; ?>" required="">  
                </td>
                <td>  
                 <input name="description" type="text" class="form-control" id="description" placeholder="<?php echo $desc; ?>" required="">   
                </td>
                <td>   
                 <input name="picture" type="name" class="form-control" id="picture" placeholder="<?php echo $pic; ?>" height="60px" width="60px" required="">   
                </td>
            </tr>
        </tbody>
    </table>
    <div class="col-md-6">    
        <button type="submit" name="submit" id="form-submit" class="btn" style="margin:15px 25px 25px 25px; background-color:#55608f; color:white;">Update</button>

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