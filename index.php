<?php
require_once "vendor/autoload.php";

use core\Router;

// On définit une constante contenant le dossier racine du projet
define('ROOT', __DIR__);

// On instancie Main (notre routeur)
$app = new Router();

// On démarre l'application
$app->start();