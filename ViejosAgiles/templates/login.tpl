{include 'templates/header.tpl'}
<div class="container">
    <form action="verify" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario (email)</label>
            <input type="email" name="nombre" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña">
        </div>

        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if}

        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
    </form>

</div>
{include 'templates/footer.tpl'}