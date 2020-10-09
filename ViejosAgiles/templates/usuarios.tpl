{include file='header.tpl'}
<div class='usuario'>
    {if isset($username)}
        <h1>Usuarios-Administradores</h1>
        <table class="tablaUsuario col-md-10" >
            <tr class="tablaUsuario">
                <th class="tabla_usuario">Mail</th>
                <th class="tabla_usuario">Tipo de Usuario</th>
                <th class="tabla_usuario">Eliminar</th>        
            </tr>
            {foreach $usuarios as $usuario}
                <tr class="tablaUsuario">
                    <td class="tablaUsuario">
                        {$usuario->nombre} {$usuario->usuario_admin}
                    </td> 
                    <td class="tablaUsuario">
                        <form action="agregarComoAdmin/{$usuario->id_usuario}" method="POST">
                            <select name="elegirAdmin">
                                <option value="0" {if ($usuario->usuario_admin=="0")}selected{/if}>Usuario</option>
                                <option value="1" {if ($usuario->usuario_admin=="1")}selected{/if}>Administrador</option>
        
                        </select>
                        <button type="submit">Cambiar</button>
                        </form>
                    </td>                
                    <td class="tablaUsuario">
                        <a href="eliminarUsuario/{$usuario->id_usuario}">Eliminar</a>
                    </td>
                </tr>
            {/foreach}
        </table>                       
    {/if}
<div>

<form action="guardarUsuario" method="POST" class="col-md-4 offset-md-4 mt-4">
<h1>{$titulo}</h1>
<div class="row">
    <div class="col">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
    </div>
    <div class="col">
        <label>Apellido:</label>
        <input type="text" name="apellido" class="form-control" placeholder="Apellido">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
        <label>Contraseña:</label>
        <input type="password" name="contrasena" class="form-control" placeholder="contraseña">
    </div>
</div>
<button type="submit" class="btn btn-primary">Registrar</button>
</form>

{include file='footer.tpl'}

