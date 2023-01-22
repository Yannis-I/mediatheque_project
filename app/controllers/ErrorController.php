<?php
namespace app\controllers;
class ErrorController extends Controller{

    public function page404()
    {
        $error = true;
        $this->render('error/error404', compact("error"), 'default');
    }
}