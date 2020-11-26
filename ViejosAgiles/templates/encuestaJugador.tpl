<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{$basehref}">    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <!-- development version, includes helpful console warnings -->
    <title>Scrum Game</title>
</head>
<body>
  <h2>Encuesta sobre ScrumGame</h2>
  <form action="enviarEncuesta" class="formularioEnvio" method="POST">

    <div class="form-group">
      <label > Escriba su correo electronico </label>
      <input type="email" name="email" class="form-control" id="email">
    </div>


    <div class="form-group">
      <label>¿Cómo te pareció la información que se muestra durante todo el juego?</label>
       <p><input type="radio" name="preg1" value="Imprescindible" valueclass="form-control" id="preg1" required="true"/>
      Imprescindible, gracias a ella fue más fácil aprender la metodología.</p>
      <p><input type="radio" name="preg1" value="Buena y útil, muestra info importantes" valueclass="form-control" id="preg1" required="true"/>
      Buena y útil, muestra info importantes.</p>
      <p><input type="radio" name="preg1" value=" Confusa, no entendía que significaban algunas cosas." valueclass="form-control" id="preg1" required="true"/>
      Confusa, no entendía que significaban algunas cosas.</p>
    </div>

    <div class="form-group">
      <label >Además de la información de la tabla de posiciones y ver tus logros ¿qué otra información agregarías para que te incentive a jugar? </label>
      <textarea class="datos" name="preg2" 
          placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
      <label>¿Qué te pareció la navegabilidad del juego?</label>
      <p><input type="radio" name="preg3" value="Fácil de usar" valueclass="form-control" id="preg3"required="true"/>
      Fácil de usar.</p>
      <p><input type="radio" name="preg3" value="La primera vez me costó entenderlo, pero después lo usé sin problemas" valueclass="form-control" id="preg3"/>
       La primera vez me costó entenderlo, pero después lo usé sin problemas.</p>
      <p><input type="radio" name="preg3" value="Siempre que lo iba a usar me costaba entenderlo." valueclass="form-control" id="preg3"required="true"/>
      Siempre que lo iba a usar me costaba entenderlo.</p>
    </div>
    
    <div class="form-group">
      <label>¿Visitaste la sección Logros? </label>
      <select name="preg4"class="form-control" id="preg4">
        <option>SI</option>
        <option>NO</option>
      </select>
    </div>

    <div class="form-group">
      <label>¿cómo te resultó la utilización de la sección Mi Perfil?</label>
      <p><input type="radio" name="preg5" value=" Fácil." valueclass="form-control" id="preg5" required="true"/>
      Fácil.</p>
      <p><input type="radio" name="preg5" value="Fácil, pero de difícil acceso." valueclass="form-control" id="preg5"/>
       Fácil, pero de difícil acceso.</p>
      <p><input type="radio" name="preg5" value="Complejo." valueclass="form-control" id="preg5" required="true"/>
      Complejo.</p>
    </div>

    <div class="form-group">
      <label>En la sección Mi Perfil, se encuentra la información personal, mi imagen
       de perfil, Logros ¿te gustaría que éstas estén separadas en distintas opciones de menú? 
    </label>
      <select name="preg6"class="form-control" id="preg6">
        <option>SI</option>
        <option>NO</option>
      </select>
    </div>

    <div class="form-group">
      <label>¿Te gustaría que salgan nuevas actualizaciones en el juegos?</label>
      <select name="preg7"class="form-control" id="preg7">
        <option>SI</option>
        <option>NO</option>
      </select>
    </div>
    
    <div class="form-group">
      <label >Mejoras o sugerencias para enriquecer el juego</label>
      <textarea class="datos" name="preg8" 
        placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
      <label>Contanos, ¿que otras metodologias agiles conoces?</label>
      <textarea class="datos" name="preg9"
        placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
    <label>¿Qué es lo que más te gustó del juego?</label>
          <p><input type="radio" name="preg10" value="jugabilidad" required="true"/> Jugabilidad</p>
          <p><input type="radio" name="preg10" value="estetica" required="true"/> Estética</p>
          <p><input type="radio" name="preg10" value="contenido" required="true" /> Contenido</p>
    </div>

    <div class="enviar">
    <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

  </form>

{include 'templates/footer.tpl'}