<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Empleados</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/Dash.css'); ?>">
</head>
<body>
    <div class="dashboard">
        <?php $this->load->view('sidebar'); ?>
        <main class="main-content">
            <section class="employee-management">
                <h1>GESTIÓN DE EMPLEADOS</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>E-Mail</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($empleados as $empleado): ?>
                            <tr>
                                <td><?php echo $empleado['nom_usu']; ?></td>
                                <td><?php echo $empleado['app_usu']; ?></td>
                                <td><?php echo $empleado['email_usu']; ?></td>
                                <td><?php echo $empleado['estatus'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('empleados/editar/' . $empleado['id_usu']); ?>" class="btn btn-edit">Editar</a>
                                    <a href="<?php echo site_url('empleados/eliminar/' . $empleado['id_usu']); ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este empleado?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Enlace actualizado para agregar nuevo empleado -->
                <a href="<?php echo site_url('empleados/registrar'); ?>" class="btn btn-add">+ AGREGAR NUEVO EMPLEADO</a>
            </section>
        </main>
    </div>
</body>
</html>
