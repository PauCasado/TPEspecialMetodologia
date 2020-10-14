<?php
include_once('./models/modelUsuario.php');
include_once('./views/loginView.php');
include_once('./helpers/auth.helper.php');

class LoginController
{
    private $view;
    private $model;
    private $authHelper;

    public function __construct()
    {
        $this->view = new LoginView();
        $this->model = new ModelUsuario();
        $this->authHelper = new AuthHelper();
    }
    public function iniciarSesion()
    {
        /* $hash = password_hash('admin', PASSWORD_DEFAULT);
        echo($hash); */
        $this->view->verLogin();
    }

    public function showRegistroJugador()
    {
        /*  // obtengo inmuebles del model
        $inmuebles = $this->model->getAll(); */

        // se las paso a la vista
        $this->view->showRegistroJugador();
    }


    public function verificarUsuario()
    {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contraseña'];
       //buscar datos del que intenta loguearse 
       //verificar contraseña y si es administrador
        $usuario = $this->model->getUsuario($nombre);
        if (!empty($usuario) && password_verify($contrasena, $usuario->clave)&& ($usuario->es_admin==1)) {
            $this->authHelper->login($usuario);
            header('Location: ' . INICIO);
        } else {
            $this->view->verLogin("Login Incorrecto");
        }
    }
    public function logout()
    {
        $this->authHelper->logout();
        header('Location: ' . LOGIN);
    }
    //falta como rellenar los campos de clave y Usuario
    public function saveJugador()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha_nac = $_POST['fecha_nac'];
        $genero = $_POST['genero'];
        $email = $_POST['email'];

        $user = $this->model->getUsuario($email, $dni);
        
        if (empty($user) && !empty($nombre) && !empty($apellido) && !empty($dni) && !empty($fecha_nac) && !empty($genero) && !empty($email)) {
            //no esta registrado un usuario en la bd -> lo registro
            $id_jugador = $this->model->guardarJugador($nombre, $apellido, $dni, $fecha_nac, $genero, $email);
            //  $id_usuario = $this->model->guardarJugador($nombre, $apellido, $dni, $fecha_nac, $genero, $email);
            // $usuario = $this->model->traerJugador($id_usuario);
            //    $this->authHelper->login($usuario);
            $this->view->error("Su solicitud ha sido enviada, cheque su mail en las proximas 24 - 48hs");
        } else if (!empty($user)) {

            $this->view->error("Este usuario ya ha enviado una solicitud");
        }
        else
        $this->view->error("Existen campo/s sin completar.");
    
    }
    public function mostrarJugadores()
    {
        $this->authHelper->chequearUsuarioRegistrado();

        $usuarios = $this->model->traerJugadores();
        $this->view->verUsuarios($usuarios);
    }

    public function generarUsuario($params = null)
    {
         //el usuario seria el nombre mail- ver como adoptamos como formar el usuario. Nombre+ultimos4digitosdni podria ser-- debemos asegurarnos que sea unico
        // la clave podria ser nombreApellido+4digitosdni
        $id = $params[':ID'];
         $user=$this->model->getUsuarioPorDNI($id);
         $clave=$user->nombre.$user->apellido;
        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
        $this->model->generarUsuarioClave($user->email,$clave_encriptada,$id);
        header('Location: ' . INICIO);
    }
    public function rechazarUsuario($params = null)
    {
        $id = $params[':ID'];
        $this->model->eliminarDatosJugador($id);
        header('Location: ' . INICIO);
    }
    public function cambiarComoAdmin($params = null)
    {
        $id = $params[':ID'];
        $valor = $_POST['elegirAdmin'];
        $this->model->serAdministrador($id, $valor);
        header("Location: " . INICIO);
    }
    public function cambiarAceptacion($params = null)
    {
        $id = $params[':ID'];
        $valor = $_POST['elegirAdmin'];
      //  $this->model->aceptarJugador($id, $valor);
        header("Location: " . INICIO);
    }
}
