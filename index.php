<?php
include('dbConnect.php');
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Delites Restaurant</title>
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


    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Here is where you find delecious food</h4>
                    <h2>Delites</h2>
                    <h2>A FULLHOUSE RESTAURANT</h2>
                    <p>The perfect place to enjoy life & food<br>Delites offers a laid back fine dining experience in a welcoming atmosphere</p>
                    <p>Timeless delightful luxury everyday for every meal</p>
                    <div class="primary-button">
                        <a href="#book-table" class="scroll-link" data-id="book-table">Reserve your table</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cook-delecious">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="first-image">
                        <img src="img/cook_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cook-content">
                        <h4>We cook delecious</h4>
                        <div class="contact-content">
                            <span>You can call us on:</span>
                            <h6>+961 01 999 999</h6>
                        </div>
                        <span>or</span>
                        <div class="primary-white-button">
                            <a href="#book-table" >Book Now</a>
                        </div>
                        <span>&</span>
                        <div class="contact-content">
                            <span>We also welcome walk-ins upon availability</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="second-image">
                        <img src="img/cook_02.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="services">
        <div class="container">
            <div class="row">
            
            <?php
            $query=mysqli_query($mysqli,"select * from subcategory")or die(mysqli_error($mysqli));
            while ($row=mysqli_fetch_array($query)){
            $catname=$row['name'];
            $catpic=$row['pic'];
            ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/<?php echo $catpic; ?>" alt="">
                        <h4><?php echo $catname; ?></h4>
                        </a>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
    </section>



    <section id="book-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Book Your Table Now</h2>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-12">
                    <div class="left-image">
                        <img src="img/book_left_image.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="right-info">
                        <h4>Reservation</h4>
                        <form action="reservation_save.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name="day" >
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
                                        <select required name="hour" >
                                            <option value="">Select hour</option>
                                            <option value="08:00:00">8:00</option>
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
                                        <input name="name" type="name" id="name" placeholder="Full name" required="">
                                    </fieldset> 
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="phone" type="phone" id="phone" placeholder="Phone number" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name="persons">
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
                                        <button type="submit"  class="btn">Book Table</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <section class="get-app" style="margin:35px;">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Get a look at what we cook</h2>
                </div>
                <div class="primary-white-button">
                    <a href="menu.php">MENU</a>
                </div>
            </div>
        </div>
    </section>



    <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Weekly Featured Food</h2>
            </div>
            <div class="row">
            <?php
            $query=mysqli_query($mysqli,"select * from featuredfood")or die(mysqli_error($mysqli));
            while ($row=mysqli_fetch_array($query)){
                $fid=$row['fid'];
                $fname=$row['fname'];
                $desc=$row['fdesc'];
                $price=$row['fprice'];
                $pic=$row['fpic'];
             ?>   
                <div class="col-md-4">
                    <div class="food-item">
                        <img src="img/<?php echo $pic; ?>" alt="">
                        <div class="price"><?php echo $price; ?></div>
                        <div class="text-content">
                            <h4><?php echo $fname; ?></h4>
                            <p><?php echo $desc; ?></p>
                        </div>
                    </div>
                </div>
             <?php }?>
            </div>
        </div>
    </section>



    <section class="our-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Our blog post</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            $bquery=mysqli_query($mysqli,"select * from blogpost")or die(mysqli_error($mysqli));
            while ($rowb=mysqli_fetch_array($bquery)){
            $bid=$rowb['bid'];
            $date=$rowb['date'];
            $title=$rowb['title'];
            $content=$rowb['content'];
            $blogpic=$rowb['bpic'];
            $author=$rowb['author'];
            $str=substr($content,0,50);
            
            ?>
                <div class="col-md-6">
                    <div class="blog-post">
                        <img src="img/<?php echo $blogpic; ?>" alt="">
                        <div class="date"><?php echo $date; ?></div>
                        <div class="right-content">
                            <h4><?php echo $title; ?></h4>
                            <span><?php echo $author; ?></span>
                            <p><?php echo $str; ?></p>
                            <div class="text-button">
                                <a href="blog.php">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>



    <section class="sign-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Signup for Our Newsletters</h2>
                    </div>
                </div>
            </div>
            <form id="contact" action="subscribe_save.php" method="post">
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <fieldset>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Enter your email here..." required="">
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        <fieldset>
                            <button type="submit" id="form-submit" class="btn">Send Message</button>
                        </fieldset>
                    </div>
                </div>
            </form>
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