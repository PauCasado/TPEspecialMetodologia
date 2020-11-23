<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');
class LoginView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $authHelper = new AuthHelper();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('username', $authHelper->obternerNombreUsuario());
        $this->smarty->assign('userid', $authHelper->obternerIdUsuario());
        $this->smarty->assign('tipoUsuario', $authHelper->obtenerTipoUsuario());
    }

    public function verLogin($error = null)
    {
        $this->smarty->assign('titulo', 'Iniciar Sesion');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    public function showRegistroJugador($error = null)
    {
        $this->smarty->assign('titulo', 'Pedir Acceso');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/registroJugador.tpl');
    }

    public function verUsuarios($usuarios)
    {
        $this->smarty->assign('titulo', 'Usuarios');
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('templates/usuarios.tpl');
    }
    public function viewMensaje($msg = null){
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/viewMsg.tpl');  
    }

    public function showEncuestaJugador($error = null)
    {
        $this->smarty->assign('titulo', 'Encuesta');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/encuestaJugador.tpl');
    }

    // {if($usuario->usuario_admin==$producto->id_categoria_fk)} selected {/if}>              
}
