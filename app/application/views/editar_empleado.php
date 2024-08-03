<!DOCTYPE html>
<html>
<head>
    <title>Editar Empleado</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/formularios.css'); ?>">
</head>
<body>
    <div class="login-container">
        <header class="registro-header">
            <h1>Jacket - On</h1>
        </header>
        <main class="login-main">
            <div class="login-form-container">
                <h2>Editar cuenta</h2>
                <p>Edite los datos que desea editar</p>
                <form class="login-form" action="<?php echo site_url('empleados/actualizar'); ?>" method="post">
                    <input type="hidden" name="id_usu" value="<?php echo $empleado['id_usu']; ?>" />
                    <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $empleado['nom_usu']; ?>" required />
                    <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $empleado['app_usu']; ?>" required />
                    <input type="email" name="email" placeholder="email@domain.com" value="<?php echo $empleado['email_usu']; ?>" required />
                    <input type="password" name="password" placeholder="Contraseña" value="" required />
                    <button type="submit" class="login-button">Guardar cambios</button>
                </form>
                <button class="pregunta-cuenta-button" onClick="window.location.href='<?php echo site_url('empleados'); ?>'">Volver</button>
            </div>
        </main>
    </div>
</body>
</html>