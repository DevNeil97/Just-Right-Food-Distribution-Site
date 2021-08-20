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
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/07aafc1913.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Products</title>
</head>

<body style="background-color: #554d4b;">
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
                	echo "<li><a href='details.php'>My profile</a></li>";
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
    <div class="container" style="background-color: #554d4b;">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="deals-tab" data-bs-toggle="tab" data-bs-target="#deals" type="button" role="tab" aria-controls="nav-deals" aria-current="true">Deals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="burgers-tab" data-bs-toggle="tab" data-bs-target="#burgers" type="button" role="tab" aria-controls="burgers" aria-selected="false">Burgers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sides-tab" data-bs-toggle="tab" data-bs-target="#sides" type="button" role="tab" aria-controls="sides" aria-selected="false">Sidess</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="drinks-tab" data-bs-toggle="tab" data-bs-target="#drinks" type="button" role="tab" aria-controls="drinks" aria-selected="false">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="desserts-tab" data-bs-toggle="tab" data-bs-target="#desserts" type="button" role="tab" aria-controls="desserts" aria-selected="false">Deserts</a>
            </li>    
        </ul>
    
<!------------------------------------------------------------------------>
            
        <div class="tab-content">
            <div class="tab-pane fade show active" id="deals" role="tabpanel" aria-labelledby="deals-tab">  
                <!--Php Code-->
                <?php
                    require_once 'includes/db.inc.php';

                    $sql1 = "SELECT deal_id, deal_name, deal_price, deal_description FROM deals ORDER BY deal_id";
                    $data1 = mysqli_query($conn,$sql1);
                    $resultdata = mysqli_num_rows($data1);
                    if ($resultdata > 0) {                      
                        while($row = mysqli_fetch_array($data1)) {
                            echo "<div class='container'>";
                                echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
                                    echo "<div class='col-sm-3'>";
                                        echo "<div class='card'>
                                                <img class='card-img-top' scr='...' alt='product image'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>".$row['deal_name']."</h5>
                                                    <p class='card-text'>".$row['deal_description']."</p>
                                                    <p class='card-text'>£".$row['deal_price']."</p>
                                                    <form action='products.php' method='post'>
                                                    <input type='hidden' name='product_id' value='".$row['deal_id']."'>
                                                    <input type='hidden' name='product_name' value='".$row['deal_name']."'>
                                                    <input type='hidden' name='product_price' value='".$row['deal_price']."'>
                                                    <button  type='submit' name='add' class='btn btn-primary'>add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                   
                ?>
            </div>
<!------------------------------------------------------------------------>
            <div class="tab-pane fade" id="burgers" role="tabpanel" aria-labelledby="burgers-tab">
                <?php
                    require_once 'includes/db.inc.php';

                    $sql1 = "SELECT burger_id, burger_name, burger_price, burger_description FROM burgers ORDER BY burger_id";
                    $data1 = mysqli_query($conn,$sql1);
                    $resultdata = mysqli_num_rows($data1);
                    if ($resultdata > 0) {                      
                        while($row = mysqli_fetch_array($data1)) {
                            echo "<div class='container'>
                                    <div class='row row-cols-1 row-cols-md-3 g-4'>
                                        <div class='col-sm-3'>
                                            <div class='card'>
                                                <img class='card-img-top' scr='...' alt='product image'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>".$row['burger_name']."</h5>
                                                    <p class='card-text'>".$row['burger_description']."</p>
                                                    <p class='card-text'>£".$row['burger_price']."</p>
                                                    <form action='products.php' method='post'>
                                                    <input type='hidden' name='product_id' value='".$row['burger_id']."'>
                                                    <input type='hidden' name='product_name' value='".$row['burger_name']."'>
                                                    <input type='hidden' name='product_price' value='".$row['burger_price']."'>
                                                    <button  type='submit' name='add' class='btn btn-primary'>add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                   
                ?>
            </div>
<!------------------------------------------------------------------------>
            <div class="tab-pane fade" id="sides" role="tabpanel" aria-labelledby="sides-tab">
                <?php
                    require_once 'includes/db.inc.php';

                    $sql1 = "SELECT side_id, side_name, side_price, side_description FROM sides ORDER BY side_id";
                    $data1 = mysqli_query($conn,$sql1);
                    $resultdata = mysqli_num_rows($data1);
                    if ($resultdata > 0) {                      
                        while($row = mysqli_fetch_array($data1)) {
                            echo "<div class='container'>
                                    <div class='row row-cols-1 row-cols-md-3 g-4'>
                                        <div class='col-sm-3'>
                                            <div class='card'>
                                                <img class='card-img-top' scr='...' alt='product image'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>".$row['side_name']."</h5>
                                                    <p class='card-text'>".$row['side_description']."</p>
                                                    <p class='card-text'>£".$row['side_price']."</p>
                                                    <form action='products.php' method='post'>
                                                    <input type='hidden' name='product_id' value='".$row['side_id']."'>
                                                    <input type='hidden' name='product_name' value='".$row['side_name']."'>
                                                    <input type='hidden' name='product_price' value='".$row['side_price']."'>
                                                    <button  type='submit' name='add' class='btn btn-primary'>add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                   
                ?>
            </div>
<!------------------------------------------------------------------------>
            <div class="tab-pane fade" id="drinks" role="tabpanel" aria-labelledby="drinks-tab">
                <?php
                    require_once 'includes/db.inc.php';

                    $sql1 = "SELECT drink_id, drink_name, drink_price, drink_description FROM beverages ORDER BY drink_id";
                    $data1 = mysqli_query($conn,$sql1);
                    $resultdata = mysqli_num_rows($data1);
                    if ($resultdata > 0) {                      
                        while($row = mysqli_fetch_array($data1)) {
                            echo "<div class='container'>
                                    <div class='row row-cols-1 row-cols-md-3 g-4'>
                                        <div class='col-sm-3'>
                                            <div class='card'>
                                                <img class='card-img-top' scr='...' alt='product image'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>".$row['drink_name']."</h5>
                                                    <p class='card-text'>".$row['drink_description']."</p>
                                                    <p class='card-text'>£".$row['drink_price']."</p>
                                                    <form action='products.php' method='post'>
                                                    <input type='hidden' name='product_id' value='".$row['drink_id']."'>
                                                    <input type='hidden' name='product_name' value='".$row['drink_name']."'>
                                                    <input type='hidden' name='product_price' value='".$row['drink_price']."'>
                                                    <button  type='submit' name='add' class='btn btn-primary'>add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                   
                ?>
            </div>
<!------------------------------------------------------------------------>
            <div class="tab-pane fade" id="desserts" role="tabpanel" aria-labelledby="desserts-tab">
                <?php
                    require_once 'includes/db.inc.php';

                    $sql1 = "SELECT dessert_id, dessert_name, dessert_price, dessert_description FROM desserts ORDER BY dessert_id";
                    $data1 = mysqli_query($conn,$sql1);
                    $resultdata = mysqli_num_rows($data1);
                    if ($resultdata > 0) {                      
                        while($row = mysqli_fetch_array($data1)) {
                            echo "<div class='container'>
                                    <div class='row row-cols-1 row-cols-md-3 g-4'>
                                        <div class='col-sm-3'>
                                            <div class='card'>
                                                <img class='card-img-top' scr='...' alt='product image'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>".$row['dessert_name']."</h5>
                                                    <p class='card-text'>".$row['dessert_description']."</p>
                                                    <p class='card-text'>£".$row['dessert_price']."</p>
                                                    <form action='products.php' method='post'>
                                                    <input type='hidden' name='product_id' value='".$row['dessert_id']."'>
                                                    <input type='hidden' name='product_name' value='".$row['dessert_name']."'>
                                                    <input type='hidden' name='product_price' value='".$row['dessert_price']."'>
                                                    <button  type='submit' name='add' class='btn btn-primary'>add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                   
                ?>

<?php
    //add items to cart
    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
            $item_array_id=array_column($_SESSION['cart'],"product_id");
            if(in_array( $_POST['product_id'], $item_array_id)){
                echo("<script>
                    alert(\"Product Already in the cart.\");
                </script>");
                echo("<script>
                    window.location = 'products.php'
                </script>");
            }else{
                $count=count($_SESSION["cart"]);
                $item_array = array(
                    'product_id'=> $_POST['product_id'],
                    'product_type'=> $_POST['product_type'],
                    'product_name'=> $_POST['product_name'],
                    'product_price'=> $_POST['product_price']
                );
                $_SESSION["cart"][$count] = $item_array;
                echo("<script>
                alert(\"Product added to the cart\");
                </script>");
                echo("<script>
                    window.location = 'products.php'
                </script>");
            }
        
        //for new session
        }else{
            //2D array to store products in the cart((Product_ID,Product_Type),(Product_ID,Product_Type))
            $item_array = array(
                'product_id'=> $_POST['product_id'],
                'product_type'=> $_POST['product_type'],
                'product_name'=> $_POST['product_name'],
                'product_price'=> $_POST['product_price']
            );
            $_SESSION['cart'][0] = $item_array;
            echo("<script>
            alert(\"Product added to the cart\");
        </script>");
        echo("<script>
                    window.location = 'products.php'
        </script>");
        }
    }
?>
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
    <script src="./scripts/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>