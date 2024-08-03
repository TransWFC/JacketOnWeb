<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/formularios.css'); ?>">
</head>
<body>
    <div class="login-container">
        <header class="registro-header">
            <h1>Jacket - On</h1>
        </header>
        <main class="login-main">
            <div class="login-form-container">
                <h2>Inicio de sesión</h2>
                <p>Ingrese sus datos para ingresar</p>
                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success" style="margin-bottom: 10px;">
                        ¡Inicio de sesión exitoso!
                    </div>
                <?php elseif (isset($error) && !$success): ?>
                    <div class="alert alert-warning" style="margin-bottom: 10px;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" action="<?php echo site_url('login/submit'); ?>" method="post">
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="email@domain.com" 
                        value="<?php echo set_value('email'); ?>"
                        required
                    />
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Contraseña" 
                        required
                    />
                    <button type="submit" class="login-button">Ingresar</button>
                    <?php if (isset($error)): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
                <p class="continuar-con">Continuar con</p>
                <div class="social-login">
                    <button class="google-login"><i class="fa fa-google"></i> Google</button>
                    <button class="facebook-login"><i class="fa fa-facebook"></i> Facebook</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
