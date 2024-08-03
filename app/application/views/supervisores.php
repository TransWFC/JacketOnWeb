<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Supervisores</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/Dash.css'); ?>">
</head>
<body>
    <div class="dashboard">
        <?php $this->load->view('sidebar'); ?>
        <main class="main-content">
            <section class="employee-management">
                <h1>GESTIÓN DE SUPERVISORES</h1>
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
                        <?php foreach ($supervisores as $supervisor): ?>
                            <tr>
                                <td><?php echo $supervisor['nom_usu']; ?></td>
                                <td><?php echo $supervisor['app_usu']; ?></td>
                                <td><?php echo $supervisor['email_usu']; ?></td>
                                <td><?php echo $supervisor['estatus'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('supervisores/editar/' . $supervisor['id_usu']); ?>" class="btn btn-edit">Editar</a>
                                    <a href="<?php echo site_url('supervisores/eliminar/' . $supervisor['id_usu']); ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este supervisor?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('registro'); ?>" class="btn btn-add">+ AGREGAR NUEVO SUPERVISOR</a>
            </section>
        </main>
    </div>
</body>
</html>
