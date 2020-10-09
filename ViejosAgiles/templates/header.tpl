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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <a class="navbar-brand" href="inicio">Scrum Game</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        {if isset($username)}
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="logout">Cerrar Sesion</a>
            </div>
        {/if}
    </div>
    </nav>
    