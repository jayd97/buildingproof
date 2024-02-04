<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style1.css">

    <title>Maintenance Proof</title>

    
  
</head>

<body>

    <div class="lang">

        <a href="log_in_EN.php"><button>EN</button></a>
        <a href="log_in_FR.php"><button>FR</button></a>


    </div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form enctype="multipart/form-data" action="../controller/SignupController.php" method="POST">
                <a class="Logos" id= 'logo_create'href="https://maintenanceproof.com/"><img src="assets/img/logo1.png" alt="Logo of Maintenance Proof"></a>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"style="color: #dbdbdb;"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" id="name" name="name" placeholder="Name">
                <input type="email" id="signup_email" name="email" placeholder="Email">
                <input type="password" id="signup_password" name="password" placeholder="Password">

                <!-- Privacy Policy and Terms of Use -->
                
                <div class="agreements">
    <div class="agreement">
        <input type="checkbox" id="agreePrivacyPolicy" name="agreePrivacyPolicy">
        <label for="agreePrivacyPolicy">I agree to the <a href="privacy_policy.html" target="_blank">Privacy Policy</a></label>
    </div>
    <div class="agreement">
        <input type="checkbox" id="agreeTermsOfUse" name="agreeTermsOfUse">
        <label for="agreeTermsOfUse">I agree to the <a href="terms_of_use.html" target="_blank">Terms of Use</a></label>
    </div>
    
</div>


                <input type="submit" class="butt" id="SignUp_Submit" name="SignUp_Submit" value="Sign Up">
                
            </form>

            
        </div>
        <div class="form-container sign-in">
            <form enctype="multipart/form-data" action="../controller/SignupController.php" method="POST">
                <a class="Logos" id= 'logo_sign'href="https://maintenanceproof.com/"><img src="assets/img/logo1.png" alt="Logo of Maintenance Proof"></a>
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"style="color: #dbdbdb;"></i></a>
                </div>
                <span>or use your email and password</span>
                <input type="email" id="signin_email" name="email" placeholder="Email">
                <input type="password" id="signin_password" name="password" placeholder="Password">

                <a href="#">Forget Your Password?</a>
                <input type="submit" class="butt" id="Signin_Submit" name="Signin_Submit" value="Sign In">
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h2>Welcome Back!</h2>
                    <p>Enter your personal details to connect</p>
                    <button class="hidden butt" id="login" class="butt">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right" id="singup">
                    <h2>HI, There!</h2>
                    <p>Register a free account to start using maintenance proof</p>
                    <button class="hidden butt" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!--Privacy Policy and Terms of Use Box-->
    <div class="wrapper" id="policyBox">
        <header>
            <div><i class='bx bxs-hand'></i></div>
            <br>
            <div><h3>Privacy Policy and Terms of Use</h3></div>
        </header>

   
        <div class="buttons">
            <button class="button" id="accept" onclick="accept()">Accept</button>
            <button class="button" id="decline">Decline</button>

        </div>
    </div>
    

    <script src="assets/js/script.js"></script>
    <script src="assets/js/script1.js"></script>

    
    
</body>

</html>