<?php
include_once('./models/modelUsuario.php');
include_once('./views/loginView.php');  
include_once('./helpers/auth.helper.php');

class LoginController{
    private $view;
    private $model;
    private $authHelper;

    public function __construct(){
        $this->view = new LoginView();
        $this->model = new ModelUsuario();
        $this->authHelper = new AuthHelper();
    }
    public function iniciarSesion(){
        $this->view->verLogin();
    } 

    public function verificarUsuario(){
        $nombre= $_POST['nombre'];
        $contrasena= $_POST['contraseña'];
        $usuario= $this->model->recibirNombreJugador($nombre);
        if(!empty($usuario) && password_verify($contrasena, $usuario->contrasena)){
            $this->authHelper->login($usuario);
            header('Location: ' . INICIO);

        }
        else{
            $this->view->verLogin("Login Incorrecto");
        }
    }
    public function logout(){
        $this->authHelper->logout();
        header('Location: '. LOGIN);
    }
    //falta como rellenar los campos de clave y Usuario
    public function saveJugador(){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $dni=$_POST['dni'];
        $fecha_nac=$_POST['fecha_nac'];
        $genero=$_POST['genero'];
        $email=$_POST['email'];
        if(isset($email)){
            $this->model->guardarJugador($nombre, $apellido, $dni, $fecha_nac,$genero, $email);
            $id_usuario=$this->model->guardarJugador($nombre, $apellido, $dni, $fecha_nac,$genero, $email);
            $usuario=$this->model->traerJugador($id_usuario);
            $this->authHelper->login($usuario);
            header('Location: ' . INICIO);
        }
    }
    public function mostrarJugadores(){
        $this->authHelper->chequearUsuarioRegistrado();
        
        $usuarios=$this->model->traerJugadores();
        $this->view->verUsuarios($usuarios);
    }
    public function borrarJugador($params=null){
        $id= $params[':ID'];
        $this->model->eliminarDatosJugador($id);
        header('Location: ' . INICIO);
    }
    public function cambiarComoAdmin($params=null){
        $id= $params[':ID'];
        $valor=$_POST['elegirAdmin'];
        $this->model->serAdministrador($id,$valor);
        header("Location: " . INICIO);
    }
    public function cambiarAceptacion($params=null){
        $id= $params[':ID'];
        $valor=$_POST['elegirAdmin'];
        $this->model->aceptarJugador($id,$valor);
        header("Location: " . INICIO);
    }
}