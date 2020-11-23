<?php

require_once("controllers/loginController.php");
require_once("Router.php");
// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');
define("LOGIN", BASE_URL . 'login');
define("INICIO", BASE_URL . 'verListaUsuarios');

$r = new Router();

//$r->addRoute('login', 'GET', 'loginController', 'iniciarSesion');
$r->addRoute('login', 'GET', 'loginController', 'iniciarSesion');
$r->addRoute('verify', 'POST', 'loginController', 'verificarUsuario');
$r->addRoute('logout', 'GET', 'loginController', 'logout');
$r->addRoute('saveJugador', 'POST', 'loginController', 'saveJugador');
$r->addRoute('verListaUsuarios', 'GET', 'loginController', 'mostrarJugadores');
$r->addRoute('generarUsuario/:ID', 'GET', 'loginController', 'generarUsuario');
$r->addRoute('rechazarUsuario/:ID', 'GET', 'loginController', 'rechazarUsuario');
$r->addRoute('agregarComoAdmin/:ID', 'POST', 'loginController', 'cambiarComoAdmin');
$r->addRoute('enviarInvitacion', 'POST', 'loginController', 'enviarInvitacion');
$r->addRoute('enviarEncuesta', 'POST', 'loginController', 'enviarEncuesta');
$r->addRoute('encuestaJugador', 'GET', 'loginController', 'showEncuestaJugador');

//ruta por defecto
//$r->setDefaultRoute('loginController', 'iniciarSesion');
$r->setDefaultRoute('loginController', 'showRegistroJugador');

//run(magia)
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
