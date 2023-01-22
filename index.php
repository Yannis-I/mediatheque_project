<?php

require_once "vendor/autoload.php";

use core\Router;
use core\LoadEnv;

// On définit une constante contenant le dossier racine du projet
define('ROOT', __DIR__);

// On charge les variables d'environnement
(new LoadEnv(ROOT . '/.env'))->load();

// On instancie Main (notre routeur)
$app = new Router();

// On démarre l'application
$app->start();