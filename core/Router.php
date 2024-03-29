<?php
namespace core;

use app\controllers\MainController;
use TypeError;
use app\controllers\ErrorController;

/**
 * Routeur principal
 */
class Router
{
    public function start()
    {
        // On démarre la session
        session_start();

        // On retire le "trailing slash" éventuel de l'URL
        // On récupère l'URL
        $uri = $_SERVER['REQUEST_URI'];

        // On vérifie que uri n'est pas vide et se termine par un /
        if(!empty($uri) && $uri != '/' && $uri[-1] === "/"){
            // On enlève le /
            $uri = substr($uri, 0, -1);
            
            // On envoie un code de redirection permanente
            http_response_code(301);

            // On redirige vers l'URL sans /
            header('Location: '.$uri);
            die();
        }

        // On gère les paramètres d'URL
        // p=controleur/methode/paramètres
        // On sépare les paramètres dans un tableau
        $params = [];
        if(isset($_GET['p'])){
            $params = explode('/', $_GET['p']);
        }

        if($params[0] != ''){
            // On a au moins 1 paramètre
            // On récupère le nom du contrôleur à instancier
            // On met une majuscule en 1ère lettre, on ajoute le namespace complet avant et on ajoute "Controller" après
            $controller = '\\app\\controllers\\'.ucfirst(array_shift($params)).'Controller';

            // On vérifie si la class existe
            if(class_exists($controller)){
                // On instancie le contrôleur
                $controller = new $controller();

                // On récupère le 2ème paramètre d'URL
                $action = (isset($params[0])) ? array_shift($params) : 'index';

                if(method_exists($controller, $action)){

                    try {
                        // Si il reste des paramètres on les passe à la méthode
                        (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
                    } catch (TypeError $e) {
                        $this->controller404();
                    }
                    
                }else{
                    $this->controller404();
                }
            }else{
                $this->controller404();
            }

        }else{
            // On n'a pas de paramètres
            // On instancie le contrôleur par défaut
            $controller = new MainController();
            
            // On appelle la méthode index
            $controller->index();
        }
    }
    private function controller404(){
        http_response_code(404);
        $controller = new ErrorController;
        $controller->page404();
    }
}