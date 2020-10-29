{include 'templates/header.tpl'}
 
  <h2>Solicitud de acceso a Scrum Game</h2>
  <form action="saveJugador" class="formularioEnvio" method="POST">
    <div class="form-group">
      <label >Nombre</label>
      <input type="nombre" name="nombre" class="form-control" id="nombre">
    </div>
    <div class="form-group">
      <label >Apellido</label>
      <input type="apellido" name="apellido" class="form-control" id="apellido">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Dni</label>
      <input type="dni" name="dni" class="form-control" id="dni">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Fecha de Nacimiento</label>
      <input type="date"name="fecha_nac" class="form-control" id="fecha_nac">
    </div>
    <div class="form-group">
      <label>Genero</label>
      <select name="genero"class="form-control" id="genero">
        <option>FEMENINO</option>
        <option>MASCULINO</option>
        <option>OTRO</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="enviar">
    <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </form>

{include 'templates/footer.tpl'}
 