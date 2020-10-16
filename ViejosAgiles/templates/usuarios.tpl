{include file='header.tpl'}
<div class='usuario'>
    {if isset($username)}
        <h1>Lista de pedidos de usuarios</h1>
        <table class="tablaUsuario col-md-10" >
            <tr class="tablaUsuario">
                <th class="tabla_usuario">Nombre</th>
                <th class="tabla_usuario">Apellido;</th>
                <th class="tabla_usuario">DNI</th>
                <th class="tabla_usuario">Fecha Nacimiento</th>
                <th class="tabla_usuario">Genero</th>
                <th class="tabla_usuario">Mail</th>
                <th class="tabla_usuario">Generar Usuario</th>
                    <th class="tabla_usuario">Rechazar Usuario</th>        
            </tr>
            {foreach $usuarios as $usuario}
                <tr class="tablaUsuario">
                    <td class="tablaUsuario">
                        {$usuario->nombre}
                    </td> 
                      <td class="tablaUsuario">
                        {$usuario->apellido}
                    </td> 
                      <td class="tablaUsuario">
                        {$usuario->dni}
                    </td> 
                      <td class="tablaUsuario">
                        {$usuario->fecha_nac}
                    </td> 
                        <td class="tablaUsuario">
                        {$usuario->genero}
                    </td> 
                          <td class="tablaUsuario">
                        {$usuario->email}
                    </td>
                    <td class="tablaUsuario">
                        <a href="generarUsuario/{$usuario->dni}">GenerarUsuario</a>
                    </td>
                          <td class="tablaUsuario">
                        <a href="rechazarUsuario/{$usuario->dni}">Rechazar Usuario</a>
                    </td>
                </tr>
            {/foreach}
        </table>                       
    {/if}
<div>

<form action="enviarInvitacion" method="POST" class=" col-md-4 offset-md-4 mt-4">
<h1>Invitación</h1>
<div class="row">
<div class="form-row">
    <div class="form-group col-md-12">
        <label>Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    
</div>
<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary" action="enviarInvitacion">Enviar Invitacion</button>
</div>
</form>

{include file='footer.tpl'}

