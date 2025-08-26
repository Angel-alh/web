
<?php
$passwordError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];

    if (empty($email) || empty($user_password)) {
        $passwordError = "Email and password cannot be empty.";
    } 
    // Case 1: Length is not 6
    elseif (strlen($user_password) !== 6) {
        $passwordError = "Password must be exactly 6 characters.";
    } 
    // Case 2: Length is 6 but missing required character types
    elseif (!preg_match('/[A-Za-z]/', $user_password) || 
            !preg_match('/[0-9]/', $user_password) || 
            !preg_match('/[\W_]/', $user_password)) {
        $passwordError = "Password must include letters, numbers, and special characters.";
    } 
    else {
        include 'connect.php';

        $sql = "INSERT INTO `users` (`full_name`, `phone`, `email`, `user_password`) 
                VALUES ('$full_name', '$phone', '$email', '$user_password')";
        $mysqlexecute = mysqli_query($conn, $sql);

        if ($mysqlexecute) {
            header("Location: login.php");
            exit();
        } else {
            die("Error inserting data: " . mysqli_error($conn));
        }
    }
}
?><html lang="en">
<head>
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
        <a href="index.html"></i> Home</a>
        <a href="about_us.html"></i>About Us</a>
        <a href="signup.php" id="active"> Register</a>
        <a href="service.html"> Services</a>
        <a href="contact.html"> contact us</a>
        <a href="login.php">Logout</a>
      </nav>
    </div>
  </header>
  <div class="head-section  ">
    <h1 class="image-text">Sign Up</h1>
     <p class="breadcrumb">
  <a href="index.html" class="breadcrumb-link">Home</a> / 
  <span class="breadcrumb-link active">Signup</span>
</p>


    <img src="images/index.jpg" alt="" height="400px" width="100%">
  </div>
  <div class="main-form">
    <div class="form-img">
    <div class="form-img">
  <h1>Create an account</h1>

  <div class="signup-info">
  <div class="info-block">
    <i class="fas fa-users icon"></i>
    <div class="info-text">
      <h3>Invite unlimited colleagues</h3>
      <p>Integrate with guaranteed developer-friendly APIs or use a low-code solution.</p>
    </div>
  </div>

  <div class="info-block">
    <i class="fas fa-check-circle icon"></i>
<!-- alternative: fa-shield-check -->
    <div class="info-text">
      <h3>Ensure compliance</h3>
      <p>Receive insights on your numbers in real time, and track visitor sources.</p>
    </div>
  </div>

  <div class="info-block">
    <i class="fas fa-shield-alt icon"></i>
    <div class="info-text">
      <h3>Built-in security</h3>
      <p>Keep your team and customers in the loop by securing your dashboard access.</p>
    </div>
  </div>
</div>


  <!-- This block stays inside .form-img but at the bottom -->
  <div class="form-extra-links">
    <div class="links">
      <a href="#">Terms</a>
      <a href="#">Privacy</a>
      <a href="#">Docs</a>
      <a href="#">Help</a>
    </div>

  <div class="language-selector">
  <i class="fas fa-globe" style="color: c28850"; ></i>
  <select id="language" name="language">
    <option value="en" selected>English</option>
    <option value="fr">Français</option>
    <option value="sw">Kiswahili</option>
    <option value="es">Español</option>
  </select>
</div>

  </div>
</div>


   <!--   <img src="images/signup.jpg" alt="" width="80%" height="95%">-->
    </div>
    <div class="form-div">
      <form class="name-form" action="signup.php" method="POST">
      <!--<h1 style="text-align: center;  color: blue;">Sign Up</h1>-->  
        <div class="name-row">
          <div class="input-fields">
            <label for="text">Full Name:</label>
            <input type="text" id="text" name="full_name" placeholder="Enter your Full Name"
              value="<?php echo isset($full_name) ? htmlspecialchars($full_name) : ''; ?>" required>
          </div><br>

          <div class="input-fields">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number"
              value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
          </div><br>

          <div class="input-fields">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email"
              value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
          </div><br>

          <div class="input-fields">
            <label for="password">Password:</label>
            <input type="password" id="password" name="user_password" placeholder="Enter your password"
              value="<?php echo isset($user_password) ? htmlspecialchars($user_password) : ''; ?>" required>
            <?php if (!empty($passwordError)) { ?>
            <span style="color: red; font-size: 14px;">
              <?php echo $passwordError; ?>
            </span>
            <?php } ?>
          </div><br>

          <button type="submit" class="btn">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
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
        <li class="contact-list">Email: <a href="mailto:furniture@gmail.com"
            class="contact-link">furniture@gmail.com</a></li>
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