<?php

class AuthHelper{
    public function __construct(){
        // inicia siempre la sesion si no esta iniciada
        if(session_status() !=PHP_SESSION_ACTIVE)
            session_start();
    } 

    public function login($usuario){
        $_SESSION['id_usuario']=$usuario->dni;
        $_SESSION['nombre']=$usuario->nombre;
        $_SESSION['usuario_admin']=$usuario->es_admin;
    }  
    public function logout(){
        session_destroy();
    }
    public function chequearUsuarioRegistrado(){
        if (isset($_SESSION['id_usuario']))
            return TRUE;
        else
            return FALSE;
        /*if(isset($_SESSION['id_usuario'])&&($_SESSION['usuario_admin'])==1)
            header('Location:' . LOGIN);
            die();
        */
    }
    public function obternerNombreUsuario(){
        if (isset($_SESSION['nombre']))    
            return $_SESSION['nombre'];
        else return null;

    }
    public function obternerIdUsuario(){
        if (isset($_SESSION['id_usuario']))    
            return $_SESSION['id_usuario'];
        else return null;

    }
    public function obtenerTipoUsuario(){
        if (isset($_SESSION['usuario_admin'])){
            return TRUE;
        }
        else{
            return FALSE;       
        }
    }
}
