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
        //  $this->smarty->assign('inmuebles', $inmuebles);
        //$this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/registroJugador.tpl');
    }

    public function verUsuarios($usuarios)
    {
        $this->smarty->assign('titulo', 'Usuarios');
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('templates/usuarios.tpl');
    }
    public function error($error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/viewError.tpl');  
    }


    // {if($usuario->usuario_admin==$producto->id_categoria_fk)} selected {/if}>              
}