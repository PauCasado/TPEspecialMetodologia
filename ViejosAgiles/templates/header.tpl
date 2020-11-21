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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav auto">
              <li class="nav-item active ">
                <a class="nav-link scrum-nav" id="" href="saveJugador">Scrum Game<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active ">
                <a class="nav-link" id="" href="saveJugador">Pedir acceso<span class="sr-only">(current)</span></a>
              </li>
               <!-- formulario de acceso al juego -->          
              {if !isset ($username)} 
                <li class="nav-item active ">
                  <a class="nav-link" id="" href="login">Iniciar Sesion <span class="sr-only">(current)</span></a>
                </li>
              {/if}
               {if isset ($username)}
                <li class="nav-item active ">
                  <a class="nav-link" id="" href="verListaUsuarios">Usuarios <span class="sr-only">(current)</span></a>
                </li>
              {/if} 
                <!-- iniciar sesion -- a la vista de todes-->
        
                {if isset ($username)}
                <li class="navbar-nav ml-active ">
                    <span class="navbar-text">{$username}</span>
                    <a class="nav-item nav-link" href="logout">Cerrar Sesion</a>
                </li>
                {/if}
               <!-- cerrar sesion -- solo para admin-->

            </ul>
        </div>
    </nav>
