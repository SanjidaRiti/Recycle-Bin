<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM p_user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="./css/style-cart-login.css.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./javascript/toggle menu.js"></script>
    <script src="./javascript/toggle.js"></script>

</head>
<body>
    
<!-----account page----->
<div class="header">
    <!-- <p style="background-image: url('img_girl.jpg');"></p> -->
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="./images/RB 5@4x.png" alt="" width="150px" height="65px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="product.html">Products</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="account.php">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html">
                <img src="./images/cart_icon-removebg-preview.png" alt="" height="30px" width="30px">
                <img src="./images/menu.png" alt="" class="menu-icon" onclick="menutoggle()">
                 </a>
            </div>
        
            <div class="row">
                <div class="col-2">
                    <h1 class="glow" id="text3d">Don't Forget The 3R!<br>Reduce,Reuse,Recycle.</h1>
                    <br>
                    <p>Life becomes easier when you always remeber these three magical<br> words. Don't worry. Recycle bin is here for remembering you the 3R.<br>Be smart & enjoy your shopping.</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            
                        </div> 
                       
					   <form action="" method="POST" >
			                
				             <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			               <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			               
			               
				               <button name="submit" class="btn">Login</button>
			            
			                <p style="font-weight:">Don't have an account?</p> <br>
							<a href="register.php">Register Here</a>
		                </form>
                      </div> 
                </div>
            </div>
    </div>
</div>

<!-- -------------footer------------ -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <!-- <img src="./images/app-store.png" alt=""> -->
                    <img src="./images/play-store.png" alt="">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="./images/RB 2@4x.png" alt="">
                <p>Our Purpose is to make people economic<br> and make their life esier.
                </p>

            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>

            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instragram</li>
                    <li>Youtube</li>
                </ul>

            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2022</p>
    </div>
</div>
 

</body>
</html>

