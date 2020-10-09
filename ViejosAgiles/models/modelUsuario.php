<?php
class ModelUsuario{
    
    private $db;
    
    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;dbname=db_scrumgame;charset=utf8', 'root', '');
    }

    public function recibirNombreJugador($nombre){
        $query=$this->db->prepare('SELECT * FROM jugador WHERE nombre=?');
        $query->execute(array($nombre));
        return $query->fetch(PDO::FETCH_OBJ);

    }
    //Guarda los datos del jugador que pide acceso a traves de formulario
    public function guardarJugador($nombre, $apellido, $dni, $fecha_nac,$genero, $email){
        $query=$this->db->prepare('INSERT INTO jugador (nombre, apellido, dni, fecha_nac,genero, email) VALUES(?,?,?,?,?,?)');
        $query->execute(array($nombre, $apellido, $dni, $fecha_nac,$genero, $email));
        return $this->db->lastInsertId();
    }
    //Trae los datos de los jugadores
    public function traerJugadores(){
        $query=$this->db->prepare('SELECT * FROM jugador');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    //Eliminar definitivamente datos de alguien
    //REVISAR SI FUNCIONA POR ID, PORQ MI PK ES DNI NO TENGO ID_USUARIO
    public function eliminarDatosJugador($id){
        $query=$this->db->prepare('DELETE FROM jugador WHERE id_usuario=?');
        $query->execute([$id]);
        
    }
    //Modificar si es administrador (1 o NULL)
    //REVISAR EL TEMA DEL ID_USUARIO 
    public function serAdministrador($id,$valor){
        $query=$this->db->prepare('UPDATE jugador SET es_admin=? WHERE id_usuario=?'); 
        $query->execute([$valor,$id]);
    }
    //Modificar si se acepta como jugador (TEXT Y o N)
    //REVISAR EL TEMA DEL ID_USUARIO
    public function aceptarJugador($id,$valor){
        $query=$this->db->prepare('UPDATE jugador SET jugador_aceptado=? WHERE id_usuario=?'); 
        $query->execute([$valor,$id]);
    }
    //Traer info sobre un jugador
    //REVISAR EL TEMA DE ID
    public function traerJugador($id){
        $query=$this->db->prepare('SELECT * FROM jugador WHERE id_usuario=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
