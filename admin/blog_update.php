<?php 
include('dbConnect.php');
session_start();
$message="";
if(isset($_GET['bpid'])){
$id=$_GET['bpid'];
$_SESSION['blog']=$id;
$mquery=mysqli_query($mysqli,"select * from blogpost where bid='".$id."'")or die(mysqli_error($mysqli));
$mrow=mysqli_fetch_array(m$query)
$title=$mrow['title'];
$auth=$mrow['author'];
$content=$mrow['content'];
$pic=$mrow['pic'];

}
if(isset($_POST['submit']))
{
$id=$_SESSION['blog'];
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$pic = $_POST['picture'];
$date=date("Y-m-d");

mysqli_query($mysqli,"UPDATE blogpost SET title='".$title."' author='".$author."' content='".$content."' pic='".$pic."' date=".$date."' WHERE bid='".$id."'")or die(mysqli_error($mysqli));  
$message.="The blog has been updated";


echo "<script type='text/javascript'>alert('".$message."')</script>";
echo "<script>document.location='blogposts.php'</script>";
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
      <h1>Update <?php echo $title; ?></h1>
  </section>
  
  
  <div class="header">
      <div class="container">
          <div class="sidenav">
              <ul>style="text-align:left; padding:15px 5px;">  
                  <li><a href="blogposts.php" ><img src="../img/close.png" ></a>  </li>
              </ul>
          </div>
      </div>
    </div>
    
 
    
    <section>
    <div class="tablecontainer">
    <form id="form-submit" action="blog_update.php" method="post">
    <table>
        <thead><tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>Picture</th>
        </tr></thead>
        <tbody>
            <tr>
                <td><?php echo $id; ?></td>
                <td> 
                    <input name="title" type="text" class="form-control" id="title" placeholder="<?php echo $title; ?>" required=""> 
                </td>
                <td> 
                    <input name="author" type="name" class="form-control" id="author" placeholder="<?php echo $auth; ?>" required="">  
                </td>
                <td>
                     <input name="content" type="text" class="form-control" id="content" placeholder="<?php echo $content; ?>" required=""> 
                </td>
                <td>   
                     <input name="picture" type="name" class="form-control" id="picture" placeholder="<?php echo $pic; ?>" height="60px" width="60px">" required=""> 
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