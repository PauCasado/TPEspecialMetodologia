<?php
class ModelUsuario
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_scrumgame;charset=utf8', 'root', '');
    }
    public function getUsuario($email, $dni)
    {
        $query = $this->db->prepare('SELECT * FROM jugador WHERE email=? OR dni=?');
        $query->execute(array($email, $dni));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function recibirNombreJugador($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM jugador WHERE nombre=?');
        $query->execute(array($nombre));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    //Guarda los datos del jugador que pide acceso a traves de formulario
    public function guardarJugador($nombre, $apellido, $dni, $fecha_nac, $genero, $email)
    {
        /* $message = $apellido;
        $message = wordwrap($message, 70);
        $subject = "Nuevo Pedido de acceso";
        $cabeceras = 'From: $email' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail("analiamega@gmail.com.ar", $subject, $message, $cabeceras); */
        $query = $this->db->prepare('INSERT INTO jugador (nombre, apellido, dni, fecha_nac,genero, email,usuario,clave,es_admin,jugador_aceptado) VALUES(?,?,?,?,?,?,?,?,?,?)');
        $query->execute(array($nombre, $apellido, $dni, $fecha_nac, $genero, $email, NULL, NULL, 0, 0));
        return $this->db->lastInsertId();
    }
    //Trae los datos de los jugadores
    public function traerJugadores()
    {
        $query = $this->db->prepare('SELECT * FROM jugador where jugador_aceptado=0 and es_admin=0');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
  
    public function getUsuarioPorDni($dni){
       $query = $this->db->prepare('SELECT * FROM jugador WHERE dni=?');
        $query->execute(array($dni));
        return $query->fetch(PDO::FETCH_OBJ);
  }
  public function generarUsuarioClave($usuario,$clave,$id)
    {
              
     //   echo($hash); 
        $query = $this->db->prepare('UPDATE jugador SET usuario =?, clave =?, jugador_aceptado=? WHERE dni=?');
        $query->execute(array($usuario,$clave,1,$id));
    }

    public function eliminarDatosJugador($id)
    {
        $query = $this->db->prepare('DELETE FROM jugador WHERE dni=?');
        $query->execute([$id]);
        //falta enviar el mail para avisar sobre el rechazo;
    }
    //Modificar si es administrador (1 o NULL)
    //REVISAR EL TEMA DEL ID_USUARIO 
    public function serAdministrador($id, $valor)
    {
        $query = $this->db->prepare('UPDATE jugador SET =? WHERE id_usuario=?');
        $query->execute([$valor, $id]);
    }

    //Traer info sobre un jugador
    //REVISAR EL TEMA DE ID
    public function traerJugador($id)
    {
        $query = $this->db->prepare('SELECT * FROM jugador WHERE dni=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
