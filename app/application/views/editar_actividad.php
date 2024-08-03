<!DOCTYPE html>
<html>
<head>
    <title>Editar Actividad</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/formularios.css'); ?>">
    <style>
        .login-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <header class="registro-header">
            <h1>Jacket - On</h1>
        </header>
        <main class="login-main">
            <div class="login-form-container">
                <h2>Editar Actividad</h2>
                <p>Modifique los datos de la actividad</p>
                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success" style="margin-bottom: 10px;">
                        ¡Actividad actualizada exitosamente!
                    </div>
                <?php elseif (isset($error) && !$success): ?>
                    <div class="alert alert-warning" style="margin-bottom: 10px;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" action="<?php echo site_url('actividades/actualizar'); ?>" method="post">
                    <input type="hidden" name="id_act" value="<?php echo set_value('id_act', $actividad['id_act']); ?>" />
                    <input type="text" name="actividad" placeholder="Nombre de la actividad" value="<?php echo set_value('actividad', $actividad['actividad']); ?>" required />
                    <textarea name="descripcion" placeholder="Descripción"><?php echo set_value('descripcion', $actividad['descripcion']); ?></textarea>
                    <label for="fech_asig">Fecha asignada</label>
                    <input type="datetime-local" name="fech_asig" placeholder="Fecha asignada" value="<?php echo set_value('fech_asig', date('Y-m-d\TH:i', strtotime($actividad['fech_asig']))); ?>" required />
                    <label for="fech_lim">Fecha límite</label>
                    <input type="datetime-local" name="fech_lim" placeholder="Fecha límite" value="<?php echo set_value('fech_lim', date('Y-m-d\TH:i', strtotime($actividad['fech_lim']))); ?>" required />
                    <input type="text" name="area" placeholder="Área" value="<?php echo set_value('area', $actividad['area']); ?>" />
                    <select name="id_usu_asignado" required>
                        <option value="">Seleccionar asignado</option>
                        <?php foreach ($empleados as $empleado): ?>
                            <option value="<?php echo $empleado['id_usu']; ?>" <?php echo ($empleado['id_usu'] == $actividad['id_usu_asignado']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($empleado['nom_usu'] . ' ' . $empleado['app_usu']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select name="id_usu_que_asigno" required>
                        <option value="">Seleccionar quien asignó</option>
                        <?php foreach ($supervisores as $supervisor): ?>
                            <option value="<?php echo $supervisor['id_usu']; ?>" <?php echo ($supervisor['id_usu'] == $actividad['id_usu_que_asigno']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($supervisor['nom_usu'] . ' ' . $supervisor['app_usu']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="login-button">Actualizar Actividad</button>
                    <?php if (isset($error)): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
                <button class="pregunta-cuenta-button" onClick="window.location.href='<?php echo site_url('actividades'); ?>'">Regresar</button>
            </div>
        </main>
    </div>
</body>
</html>
