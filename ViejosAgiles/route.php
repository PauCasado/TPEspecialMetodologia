<?php

    require_once("controllers/loginController.php");
    require_once("Router.php");
     // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("INICIO", BASE_URL . 'verListaUsuarios');
      
    $r = new Router();

    $r->addRoute('login', 'GET', 'loginController','iniciarSesion');
    $r->addRoute('verify', 'POST', 'loginController','verificarUsuario');
    $r->addRoute('logout', 'GET', 'loginController','logout');
    $r->addRoute('guardarUsuario', 'POST', 'loginController', 'saveUsuario');
    $r->addRoute('verListaUsuarios', 'GET', 'loginController', 'mostrarUsuarios');
    $r->addRoute('eliminarUsuario/:ID', 'GET','loginController', 'borrarUsuario');
    $r->addRoute('agregarComoAdmin/:ID', 'POST', 'loginController', 'cambiarComoAdmin');
    

    //ruta por defecto
    $r->setDefaultRoute('loginController','iniciarSesion');

    //run(magia)
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 