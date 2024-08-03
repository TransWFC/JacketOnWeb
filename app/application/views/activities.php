<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Actividades</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/Dash.css'); ?>">
</head>
<body>
    <div class="dashboard">
        <?php $this->load->view('sidebar'); ?>
        <main class="main-content">
            <section class="employee-management">
                <h1>GESTIÓN DE ACTIVIDADES</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Actividad</th>
                            <th>Descripción</th>
                            <th>Fecha asignada</th>
                            <th>Fecha límite</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Área</th>
                            <th>Asignado a</th>
                            <th>Asignado por</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actividades as $actividad): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($actividad['actividad']); ?></td>
                                <td><?php echo isset($actividad['descripcion']) ? htmlspecialchars($actividad['descripcion']) : 'Sin descripción'; ?></td>
                                <td><?php echo isset($actividad['fech_asig']) ? date('d/m/Y H:i', strtotime($actividad['fech_asig'])) : 'Sin fecha asignada'; ?></td>
                                <td><?php echo isset($actividad['fech_lim']) ? date('d/m/Y H:i', strtotime($actividad['fech_lim'])) : 'Sin fecha límite'; ?></td>
                                <td><?php echo isset($actividad['fech_ini']) ? date('d/m/Y H:i', strtotime($actividad['fech_ini'])) : 'Sin fecha inicio'; ?></td>
                                <td><?php echo isset($actividad['fech_fin']) ? date('d/m/Y H:i', strtotime($actividad['fech_fin'])) : 'Sin fecha fin'; ?></td>
                                <td><?php echo isset($actividad['area']) ? htmlspecialchars($actividad['area']) : 'Sin área'; ?></td>
                                <td><?php echo isset($actividad['asignado_nombre']) ? htmlspecialchars($actividad['asignado_nombre']) : 'Desconocido'; ?></td>
                                <td><?php echo isset($actividad['asigno_nombre']) ? htmlspecialchars($actividad['asigno_nombre']) : 'Desconocido'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('actividades/editar/' . $actividad['id_act']); ?>" class="btn btn-edit">Editar</a>
                                    <a href="<?php echo site_url('actividades/eliminar/' . $actividad['id_act']); ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar esta actividad?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('actividades/agregar'); ?>" class="btn btn-add">+ AGREGAR NUEVA ACTIVIDAD</a>
            </section>
        </main>
    </div>
</body>
</html>
