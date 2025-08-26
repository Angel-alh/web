<?php
$emailError = $passwordError = '';
$showSignupPrompt = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];

    include 'connect.php';

    // Check if both email and password match
    $sql = "SELECT * FROM `users` WHERE email='$email' AND user_password='$user_password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        header("location: index.html");
        exit;
    } else {
        // If incorrect, check which one is wrong
        $checkEmail = "SELECT * FROM `users` WHERE email='$email'";
        $emailResult = mysqli_query($conn, $checkEmail);

        if (!$emailResult || mysqli_num_rows($emailResult) == 0) {
            $emailError = "Invalid email";
        }

        $checkPassword = "SELECT * FROM `users` WHERE user_password='$user_password'";
        $passwordResult = mysqli_query($conn, $checkPassword);

        if (!$passwordResult || mysqli_num_rows($passwordResult) == 0) {
            $passwordError = "Invalid password";
        }

        // If both wrong → prompt signup
        if (!empty($emailError) && !empty($passwordError)) {
            $showSignupPrompt = true;
        }
    }
}
?>





<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Furniture Explorer</title>
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>
    <header>
      <div class="familyCarpenter">
        <p class="family">Family Carpenter</p>
</div>
   <div class="nav">
        <nav class="nav-list">
            <a href="index.html" ></i> Home</a>
            <a href="about_us.html"></i>About Us</a>
            <a href="signup.php"> Register</a>
            <a href="service.html"> Services</a>
            <a href="contact.html"> contact us</a>
            <a href="login.php" id="active">Logout</a>
        </nav>
</div>
    </header>
       <div class="head-section  ">
        <h1 class="image-text">Login</h1>
             <p class="breadcrumb">
  <a href="index.html" class="breadcrumb-link">Home</a> / 
  <span class="breadcrumb-link active">Login</span>
</p>
        <img src="images/index.jpg" alt="" height="400px" width="100%">
    </div>
    <div class="form-div">
     <form class="name-form" action="login.php" method="POST" style="height: auto;">
    <h1 style="text-align: center; color: #654321;">Login</h1>
    
    <div class="name-row">
        <div class="input-fields">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>
            <p style="color:red;">
                <?php if (!empty($emailError)) echo $emailError; ?>
            </p>
        </div>
    <div class="input-fields">
        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password" placeholder="Enter your user_password" required>
        <p style="color:red;">
            <?php if (!empty($user_passwordError)) echo $user_passwordError; ?>
        </p>
    </div>
      </div>
    <button type="submit" class="btn" >Login</button>
    <?php if ($showSignupPrompt): ?>
        <div style="
      margin-top: 8px;
      padding: 10px;
      background-color: #fdecea;
      color: #b10000;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      text-align: center;
      animation: fadeIn 0.6s ease-in;
        ">
            <strong>Don't have an account?</strong> 
            <a href="signup.php" style="color: #004085; text-decoration: underline; margin-left: 5px;">
                Please sign up
            </a>
        </div>
    <?php endif; ?>
</form>
    </div>
  <script src="js/scroll-reveal.js"></script>
</body>
<footer>
  <div class="myfooter">
    <div class="about">
      <h2 style="margin-left: 7%; margin-top: 12px;" class="h2">About Us</h2>
      <div class="paragraph">
        <p class="vertical-paragraph">Engaging in different furniture designing, repairing, making furniture of one's
          desire and offering tutorials based on the furniture.</p>
      </div>
    </div>

    <div class="services">
      <h2 style="margin-left: 3%;  margin-top: 0px;" class="h2">Our Services</h2>
      <ul class="mylist">
        <li class="service-list"><a href="#" class="service-link">➤ Furniture repairing</a></li>
        <li class="service-list"><a href="#" class="service-link">➤ Furniture making</a></li>
        <li class="service-list"><a href="#" class="service-link">➤ Offering tutorials based on furniture</a></li>
      </ul>
    </div>

    <div class="contact">
      <h2 style="margin-left: 15%;" class="h2">Contact Us</h2>
      <ul>
        <li class="contact-list">Email: <a href="mailto:furniture@gmail.com" class="contact-link">furniture@gmail.com</a></li>
        <li class="contact-list">Phone: <a href="tel:+255754452555" class="contact-link">+255754452555</a></li>
      </ul>
    </div>

    <hr class="footer-divider">

    <div class="footer-bottom">
      <div class="copyright">
        <p>© 2025 Furniture Explorer</p>
      </div>
      <div class="social-icons">
        <ul class="social-media">
          <li><i class="fa-brands fa-instagram"></i></li>
          <li><i class="fa-brands fa-facebook-f"></i></li>
          <li><i class="fa-brands fa-tiktok"></i></li>
          <li><i class="fa-brands fa-twitter"></i></li>
        </ul>
      </div>
    </div>
  </div>
</footer>


</html>