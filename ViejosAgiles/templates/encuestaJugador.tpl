{include 'templates/header.tpl'}
 
  <h2>Encuesta sobre ScrumGame</h2>
  <form action="enviarEncuesta" class="formularioEnvio" method="POST">

    <div class="form-group">
      <label > Escriba su correo electronico </label>
      <input type="email" name="email" class="form-control" id="email">
    </div>


    <div class="form-group">
      <label>¿Cómo te pareció la información que se muestra durante todo el juego?</label>
       <p><input type="radio" name="preg1" value="r1.1" valueclass="form-control" id="preg1"/>
      Imprescindible, gracias a ella fue más fácil aprender la metodología.</p>
      <p><input type="radio" name="preg1" value="r1.2" valueclass="form-control" id="preg1"/>
      Buena y útil, muestra info importantes.</p>
      <p><input type="radio" name="preg1" value="r1.3" valueclass="form-control" id="preg1"/>
      Confusa, no entendía que significaban algunas cosas.</p>
    </div>

    <div class="form-group">
      <label >Además de la información de la tabla de posiciones y ver tus logros ¿qué otra información agregarías para que te incentive a jugar? </label>
      <textarea class="datos" name="preg2" cols="70" rows="7"
          placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
      <label>¿Qué te pareció la navegabilidad del juego?</label>
      <p><input type="radio" name="preg3" value="r3.1" valueclass="form-control" id="preg3"/>
      Fácil de usar.</p>
      <p><input type="radio" name="preg3" value="r3.2" valueclass="form-control" id="preg3"/>
       La primera vez me costó entenderlo, pero después lo usé sin problemas.</p>
      <p><input type="radio" name="preg3" value="r3.3" valueclass="form-control" id="preg3"/>
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
      <p><input type="radio" name="preg5" value="r5.1" valueclass="form-control" id="preg5"/>
      Fácil.</p>
      <p><input type="radio" name="preg5" value="r5.2" valueclass="form-control" id="preg5"/>
       Fácil, pero de difícil acceso.</p>
      <p><input type="radio" name="preg5" value="r5.3" valueclass="form-control" id="preg5"/>
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
      <textarea class="datos" name="preg8" cols="70" rows="7"
        placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
      <label>Contanos, ¿que otras metodologias agiles conoces?</label>
      <textarea class="datos" name="preg9" cols="70" rows="7"
        placeholder="Escriba aqui su respuesta..."></textarea>
    </div>

    <div class="form-group">
    <label>¿Qué es lo que más te gustó del juego?</label>
          <p><input type="checkbox" name="preg10" value="jugabilidad"/> Jugabilidad</p>
          <p><input type="checkbox" name="preg10" value="estetica"/> Estética</p>
          <p><input type="checkbox" name="preg10" value="contenido"/> Contenido</p>
    </div>

    <div class="enviar">
    <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

  </form>

{include 'templates/footer.tpl'}