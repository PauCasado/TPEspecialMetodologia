<?php
include_once('./models/modelUsuario.php');
include_once('./views/loginView.php');
include_once('./helpers/auth.helper.php');
include_once('helpers/mail.helper.php');

class LoginController
{
    private $view;
    private $model;
    private $authHelper;
    private $mailHelper;

    public function __construct()
    {
        $this->view = new LoginView();
        $this->model = new ModelUsuario();
        $this->authHelper = new AuthHelper();
        $this->mailHelper = new MailHelper();
    }
    public function iniciarSesion()
    {
        /* $hash = password_hash('admin', PASSWORD_DEFAULT);
        echo($hash); */
        $this->view->verLogin();
    }

    public function showRegistroJugador(){
        // se las paso a la vista
        $this->view->showRegistroJugador();
    }


    public function verificarUsuario(){
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contraseña'];
       //buscar datos del que intenta loguearse 
       //verificar contraseña y si es administrador
        $usuario = $this->model->obtenerNombreUsuario($nombre);
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

        //se chequean que los campos obligatorios esten completos     
        
        if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($fecha_nac) && !empty($genero) && !empty($email)) {
            //consulto si hay un usuario ya registrado con ese email o dni
            $user = $this->model->getUsuario($email, $dni);
            if (empty($user) ){ 
            //si no existe un usuario en la bd con ese usuario y email -> le doy de alta en la  bd 
           $this->model->guardarJugador($nombre, $apellido, $dni, $fecha_nac, $genero, $email);
            $this->view->viewMensaje("Su solicitud ha sido enviada, cheque su mail en las proximas 24 - 48hs");
        } else if (!empty($user)) {

            $this->view->viewMensaje("Este usuario ya ha enviado una solicitud");
        }}
        else
        $this->view->viewMensaje("Existen campo/s sin completar.");
    
    }
    public function mostrarJugadores(){
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
        $sendMail= $this->mailHelper->sendMail($clave, $user->email, $user->email);
                    if($sendMail){
                        $this->view->viewMensaje("El mail ha sido enviado " );

                    }else{
                        $this->view->viewMensaje("Error al mandar mail");
                    }
      
    }
    public function rechazarUsuario($params = null)
    {
        $id = $params[':ID'];
   
        $user=$this->model->getUsuarioPorDni($id);
        $this->model->eliminarDatosJugador($id);
       $rechazo= $this->mailHelper->enviarNotificacionRechazo($user->email);
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
    public function enviarInvitacion(){
        $email = $_POST['email'];
        $sendInvitacion= $this->mailHelper->sendInvitacion($email);
        if($sendInvitacion){
            $this->view->viewMensaje("Invitación enviada " );
        }else{
            $this->view->viewMensaje("Error, no pudo enviar la invitación");
        }
    }

    public function showEncuestaJugador(){
        // se las paso a la vista
        $this->view->showEncuestaJugador();
    }
    
    public function enviarEncuesta(){
        $email = $_POST['email'];
        $p1 = $_POST['preg1'];
        $p2 = $_POST['preg2'];
        $p3 = $_POST['preg3'];
        $p4 = $_POST['preg4'];
        $p5 = $_POST['preg5'];
        $p6 = $_POST['preg6'];
        $p7 = $_POST['preg7'];
        $p8 = $_POST['preg8'];
        $p9 = $_POST['preg9'];
        $p10 = $_POST['preg10'];
        if (!empty($email) && !empty($p1) && !empty($p2)&& !empty($p3)&& !empty($p4)
        && !empty($p5) && !empty($p6)&& !empty($p7)&& !empty($p8)&& !empty($p9)&& !empty($p10)){
          
            $sendEncuesta= $this->mailHelper->sendEncuesta($email,$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
      
             if($sendEncuesta){
                $this->view->viewMensaje("Encuesta enviada" );
            }else{
                $this->view->viewMensaje("Error, no se pudo enviar la encuesta");
            } 
        }else {
            $this->view->viewMensaje("Hay campos sin completar");
        }
    }

    
}
