<!DOCTYPE html>
<html>
<head>
    <title>Registro de Empleados</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/formularios.css'); ?>">
</head>
<body>
    <div class="login-container">
        <header class="registro-header">
            <h1>Jacket - On</h1>
        </header>
        <main class="login-main">
            <div class="login-form-container">
                <h2>Registro de Empleados</h2>
                <p>Ingrese todos los datos</p>
                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success" style="margin-bottom: 10px;">
                        ¡Registro exitoso!
                    </div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-warning" style="margin-bottom: 10px;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" action="<?php echo site_url('empleados/registrar_submit'); ?>" method="post">
                    <input 
                        type="text" 
                        name="nombre" 
                        placeholder="Nombre" 
                        required
                    />
                    <input 
                        type="text" 
                        name="apellido" 
                        placeholder="Apellido" 
                        required
                    />
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="email@domain.com" 
                        required
                    />
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Contraseña" 
                        required
                    />
                    <button type="submit" class="login-button">Registrar</button>
                    <?php if (isset($error)): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
                <button class="pregunta-cuenta-button" onClick="window.location.href='<?php echo site_url('empleados'); ?>'">Regresar</button>
            </div>
        </main>
    </div>
</body>
</html>
