<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <form>
                <a class="Logos" id= 'logo_create'href="https://maintenanceproof.com/"><img src="assets/img/logo1.png" alt="Logo of Maintenance Proof"></a>
                <h1>Créer un Compte.</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"style="color: #dbdbdb;"></i></a>
                </div>
                <span>ou utilisez votre email pour l'inscription </span>
                <input type="text" placeholder="Nom">
                <input type="email" placeholder="Courriel">
                <input type="password" placeholder="Mot de Passe">

                <!-- Politique de confidentialité et Conditions d'utilisation -->
              
                <div class="agreements">
    <div class="agreement">
        <input type="checkbox" id="agreePrivacyPolicy" name="agreePrivacyPolicy">
        <label for="agreePrivacyPolicy">J'accepte la <a href="politique_de_confidentialite.html" target="_blank">Politique de confidentialité</a></label>
    </div>
    <div class="agreement">
        <input type="checkbox" id="agreeTermsOfUse" name="agreeTermsOfUse">
        <label for="agreeTermsOfUse">J'accepte les <a href="conditions_utilisation.html" target="_blank">Conditions d'utilisation</a></label>
    </div>
    
</div>

                <input type="submit" class="butt" id="SignUp_Submit" name="SignUp_Submit" value="S'incrire">
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <a class="Logos" id= 'logo_sign'href="https://maintenanceproof.com/"><img src="assets/img/logo1.png" alt="Logo of Maintenance Proof"></a>
                <h1>Se connecter</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g" style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"style="color: #dbdbdb;"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"style="color: #dbdbdb;"></i></a>
                </div>
                <span>ou utilisez votre email et votre mot de passe</span>
                <input type="email" placeholder="Courriel">
                <input type="password" placeholder="Mot de Passe">
                <a href="#">Vous avez oublié votre mot de passe ?</a>
                <button class="butt">Se connecter</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h2>Bon retour!</h2>
                    <p>Entrez vos données personnelles pour vous connecter</p>
                    <button class="hidden butt" id="login" class="butt">Se connecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h2>Bonjour!</h2>
                    <p>Créez un compte gratuit pour commencer à utiliser maintenance proof</p>
                    <button class="hidden butt" id="register" onclick="showPrivacyPolicyAndTermsOfUseBox()">S'inscrire</button>
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