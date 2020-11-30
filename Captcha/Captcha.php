<?php
session_start();

require_once('include_path_inc.php');
require_once('Text/CAPTCHA.php');

// Instanciation d'un objet Text_CAPTCHA de type Image
$captcha = Text_CAPTCHA::factory('Image');

// Initialisation
$err = $captcha->init();
if (PEAR::isError($err)) {
    die("Erreur d'initialisation du CAPTCHA:".$err->getMessage());
}

// Stockage en session du mot 
$_SESSION['sess_captcha'] = $captcha->getPhrase();
// ATTENTION: Si la cle de session est simplement 'captcha' et que
// register_globals = On, l'objet $captcha sera ecrase par la variable de sess.

// Recuperation de l'image au format PNG
$png = $captcha->getCAPTCHAAsPNG();
if (PEAR::isError($png)) {
    die("Impossible de creer l'image".$png->getMessage());
}

// "Affichage" de l'image
header("Content-Type: image/png");
echo $png;
?>