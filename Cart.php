<?php
//start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart</title>
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
            <li> 
                <a href="account.php">My Account</a>
            </li>
            <li> 
                <a href="Cart.php">Cart
                <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo"<span id = 'cart_count'> $count</span>";
                }else{
                    echo"<span id = 'cart_count'> 0 </span>";
                }
                ?></a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <!--NavBar-->
    
    <!--------Cart-Start-------->
    <div class="content">
        <div class="cart">
            <table id="cart-tabel">
                <tr>
                    <th>Product</th>
                    <th>Remove</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                
                <!--Display products on cart-->
                <?php
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        $i = 0 ;

                        while($i < $count){
                            $name = $_SESSION['cart'][$i]['product_name'];
                            $price = $_SESSION['cart'][$i]['product_price'];

                            echo("
                                    <tr class='cart-row'>
                                    <td>
                                        <div class='product-info'>
                                            <img src='...'>
                                        <div>
                                        <!--Only need to pull the indi: price, quantity and the name of each item on the cart from the database total will be calculated automaticly -->
                                        <p>$name</p>   
                                        <small class='ind-price'>Price: £$price</small>
                                        <div class='remove-button'>
                                            
                                        </div>
                                        </div>
                                        </div>
                                        </td>
                                        <td>
                                        <button type='button' value='Delete' onclick='deleteRow(this)'>Remove</button>
                                        </td>
                                        <td>
                                        <input type='number' value='1' class='quantity-input' min='1' onclick='updateRowTotal(this)'>
                                        </td>
                                        <td class='row-sub-tot'>£1.50</td>
                                        </tr>
                                ");
                            $i = $i + 1; 
                        }


                    }
                    
                    else{

                    }
                ?>
            </table>
        </div>
            <div class="tot-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td class="price" id="final-sub-tot">£4.50</td>
                    </tr>
                    <tr>
                        <td>Delivary</td>
                        <td class="price" id="delivary-fee">£5.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="price" id="final-tot">£9.50</td>
                    </tr>
                </table>
            </div>
            <?php
                if(isset($_SESSION['cstr_uid'])){
                    echo(
                        '
                        <div class="btn-cart" id="paypal-button-container"></div>
                        '
                    );
                    
                }
                else{
                    echo(
                        "   
                        <div class = 'logInText'>
                            <h1>Please log in to your account to checkout</h1>
                        </div>
                        "

                    );
                }
            ?>
               
</div>

    <!--------Cart-End-------->
    
    <!--Footer-->
    <footer>            
        <div class="footer-info">
        <h1>Useful links</h1>
        <h3><a href="#">Contact us</a></h3>
        <h3><a href="#">Terms of use</a></h3>
        <h3><a href="#">Privicy policy</a></h3>
        </div>
        <div class="footer-content">
            © Just Right. All rights reserved.
        </div>
    </footer>
    
    <!--Footer-->
    
    <!---Change the client-id = "Your client id"--->
    <script src="https://www.paypal.com/sdk/js?client-id=ARFJ0H4l4bODqgFSut6sVjuYso_kaEOd05b0xU-7WoxQEClbXuXHlnxPuTJ4QvlaDuOi8923TwDkDbtG&currency=GBP&disable-funding=credit,card""></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!---Paypal Script--->
    <script>
            function getFinalTotal(){
                var rowPrices = document.getElementsByClassName('row-sub-tot');
                var deliFee = document.getElementById("delivary-fee");
                var total = 0.00;
                var subtotal = 0;
                for (var i = 0; i < rowPrices.length; i++) {
                    var price =parseFloat(rowPrices[i].innerText.replace('£',''));
                    total=total+price;
                }
                if(total > 0){
                    total=total+parseFloat(deliFee.innerText.replace('£',''));
                }else{
                    total = 0;
                }
                return total;
                }
            //paypal payments
            paypal.Buttons({
                style: {
                    layout:  'vertical',
                    color:   'blue',
                    shape:   'pill',
                    label:   'pay'
                },
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: ''+getFinalTotal()
                    }
                    }]
                });
                },             
                // on transaction complete
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location= "transaction-completed.php" 
                });
                },
                // do this on cancel
                onCancel: function (data, actions) {
                    alert('Payment has been Canceled');
                },
            }).render('#paypal-button-container'); 
    </script>

    <script src="./scripts/navbar.js"></script>
    <script src="./scripts/cart.js"></script>
</body>
</html>