<?php

require_once("utils/connect.php");

$query = " SELECT * FROM records ";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/fav.png"/>
    <!-- Author Meta -->
    <meta name="author" content="colorlib"/>
    <!-- Meta Description -->
    <meta name="description" content=""/>
    <!-- Meta Keyword -->
    <meta name="keywords" content=""/>
    <!-- meta character set -->
    <meta charset="UTF-8"/>
    <!-- Site Title -->
    <title>FPT Education</title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet"/>
    <!--
        CSS
        =============================================
      -->
    <link rel="stylesheet" href="assets/css/linearicons.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/magnific-popup.css"/>
    <link rel="stylesheet" href="assets/css/owl.carousel.css"/>
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/hexagons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>

<!-- ================ Start Header Area ================= -->
<header class="default-header">
    <nav class="navbar navbar-expand-lg  navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/gr.png" alt=""/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="trainee_accounts.php">Trainee</a></li>
                    <li><a href="view_trainer.php">Trainer</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            Course
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="courses.php">IT</a>
                            <a class="dropdown-item" href="course-details.html">Bussiness</a>
                            <a class="dropdown-item" href="elements.html">Graphic Design</a>
                        </div>

                    </li>
                    <li><a href="controllers/logout_handler.php">logout</a></li>

                    <li>
                        <button class="search">
                            <span class="lnr lnr-magnifier" id="search"></span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="search-input" id="search-input-box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search-input" placeholder="Search Here"/>
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close-search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- ================ End Header Area ================= -->

<!-- ================ start banner Area ================= -->
<section class="home-banner-area">
    <div class="container">
        <div class="row justify-content-center fullscreen align-items-center">
            <div class="col-lg-5 col-md-8 home-banner-left">
            </div>
            <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
                <img class="img-fluid" src="assets/img/header-img.png" alt=""/>
            </div>
        </div>
    </div>
</section>

<body class="records">

<div class="container">
    <div class="row">
        <div class="col m-auto">
            <div class="card mt-5">
                <table class="table table-bordered">
                    <tr>
                        <td> User ID</td>
                        <td> User Name</td>
                        <td> User Email</td>
                        <td> Edit</td>
                        <td> Delete</td>
                    </tr>

                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                        $UserID = $row['User_ID'];
                        $UserName = $row['User_Name'];
                        $UserEmail = $row['User_Email'];
                        ?>
                        <tr>
                            <td><?php echo $UserID ?></td>
                            <td><?php echo $UserName ?></td>
                            <td><?php echo $UserEmail ?></td>
                            <td><a href="edit_trainer.php?GetID=<?php echo $UserID ?>">Edit</a></td>
                            <td><a href="controllers/delete_trainer.php?Del=<?php echo $UserID ?>">Delete</a></td>
                            <script type="text/javascript">
                                var elems = document.getElementsByClassName('records');
                                var confirmIt = function (e) {
                                    if (!confirm('Are you sure?')) e.preventDefault();
                                };
                                for (var i = 0, l = elems.length; i < l; i++) {
                                    elems[i].addEventListener('click', confirmIt, false);
                                }
                            </script>
                        </tr>
                        <?php
                    }
                    ?>


                </table>
                <button onclick="location.href='insert_trainer.php'">Add</button>
                <li><a href="admin.php">Back to homepage</a></li>
            </div>
        </div>
    </div>
</div>
<!-- ================ start footer Area ================= -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Top Products</h4>
                <ul>
                    <li><a href="#">Managed Website</a></li>
                    <li><a href="#">Manage Reputation</a></li>
                    <li><a href="#">Power Tools</a></li>
                    <li><a href="#">Marketing Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Features</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Experts</a></li>
                    <li><a href="#">Agencies</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>Newsletter</h4>
                <p>You can trust us. we only send promo offers,</p>
                <div class="form-wrap" id="mc_embed_signup">
                    <form target="_blank"
                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                          method="get" class="form-inline">
                        <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                               required="" type="email">
                        <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->

<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/hexagons.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

</body>
</html>


