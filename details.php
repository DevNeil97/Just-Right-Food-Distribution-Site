<?php
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/07aafc1913.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Just Right</title>
</head>
<body>
    <!--NavBar-->
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.jpg" alt="logo"></a>
        </div>
        <ul class="nav-links">
            <li> 
                <a href="index.php">Home</a>
            </li>
            <li> 
                <a href="products.php">Food</a>
            </li>
            <li> 
                <a href="about.php">About Us</a>
            </li>
            <?php
                if(isset($_SESSION["cstr_uid"])) {
                	echo "<li><a href='details.php'>profile</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                    }
                    else {
                    echo  "<li><a href='account.php'>My Account</a></li>";
                    }
            ?>
            <li> 
                <a href="Cart.php">Cart
                <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo"<span id = 'cart_count'> $count</span>";
                }else{
                    echo"<span id = 'cart_count'> 0 </span>";
                }
                ?>
                </a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <!--NavBar-->
    <?php 
    include_once 'includes/db.inc.php';
    $sqlquery = "SELECT cstr_Name, cstr_email, cstr_mobile, address_1, address_2, county, postcode FROM customer WHERE cstr_Uid = '".$_SESSION["cstr_uid"]."'";
    $myresults = mysqli_query($conn,$sqlquery);
    $row = mysqli_fetch_assoc($myresults);

    echo"<div class ='container clear-fix'>";
        echo"<div class='row clear-fix'>";
            echo"<div class ='col bg-light d-grid gap-3'>";
                    echo"<h1>Info</h1>";
                        echo"<div class = 'infoText'>";
                            echo"<div><span class='h5'>Name:</span> <span>".$row['cstr_Name']."</span> </div>";
                                echo"<div><span class='h5'>Email:</span> <span> ".$row['cstr_email']."</span> </div>";
                            echo"<div><span class='h5'>Mobile:</span> <span> ".$row['cstr_mobile']."</span> </div>";
                        echo"<div><span class= 'h5'>Address Line 1:</span> <span>".$row['address_1']."</span> </div>";
                    echo"<div><span class= 'h5'>Address Line 2:</span> <span>".$row['address_2']."</span> </div>";
                echo"<div><span class= 'h5'>County:</span> <span>".$row['county']."</span> </div>";
            echo"<div><span class= 'h5'>Post Code:</span> <span>".$row['postcode']."</span> </div>";
        echo"</div>";
    ?>
    </div>
        <div class="col bg-light border-left">
        <h1>Order Details</h1>
        <table style="width:100%" class ="table table-dark">
        <tr>
            <th>Oder ID</th>
            <th>quantity</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>191243</td>
            <td>4</td>
            <td>Pending </td>
        </tr>
        <tr>
            <td>101234</td>
            <td>7</td>
            <td>Arrived</td>
        </tr>
        </table>
        </div>
    </div>
    <div class="row bg-white">
        <div class="container">
            <div class="sign-form">
                <form action="includes/cstr.address.inc.php" method="post" enctype="multipart/form-data">
                    <h2>Address details</h2>
                    <p class="hint-text"> enter null for empty spots</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="postcode" placeholder="Postcode..." required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="county" placeholder="County..." required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address_1" placeholder="Address 1..." required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address_2" placeholder="Address 2..." required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cstr_mobile" placeholder="Mobile..." required="required">
                    </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success btn-lg btn-block">add/update address</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <!--Footer-->
    <footer class="text-center text-lg-start clearfix" style="width:100%" >
            <div class="container">
                <div class="row bg-transparent text-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0 bg-transparent">
                        <h5 class="text-uppercase bg-transparent text-light">about us</h5>
                        <p class="bg-transparent text-light">We are JustRight, a food delivery service from a product range of burgers to pizzas,
                            here catering to customers where needed and providing a happy service, to learn more please head to the link
                        </p>
                        <a class="text-light bg-transparent" href="about.php">find out more</a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 bg-transparent text-center">
                        <h5 class="text-uppercase mb-0 bg-transparent text-light">Useful Links</h5>
                        <ul class="list-unstyled bg-transparent">
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Terms and Privacy</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="contact.html" class="text-light bg-transparent">Contact Us</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Legal</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Health Warning</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 bg-transparent">
                        <h5 class="text-uppercase mb-0 bg-transparent text-light">Social Media</h5>
                        <ul class="list-unstyled bg-transparent">
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-facebook bg-transparent"></i></a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-twitter bg-transparent"></i></a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-instagram bg-transparent"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3 text-light" style="background-color: #272729;">
                © 2020 Copyright:
                <a class="text-light bg-transparent" href="#">JustRight</a>
            </div>
        </footer>

    <!--Footer-->
    <!--Scripts-->
    <script src="./scripts/navbar.js"></script>
    <script src="./scripts/app.js"></script>
</body>
</html>