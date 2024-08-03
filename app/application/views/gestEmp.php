<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Empleados</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/Dash.css'); ?>">
</head>
<body>
    <div class="employee-management">
        <h1>GESTIÓN DE EMPLEADOS</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>E-Mail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se cargarán los datos de los empleados desde el controlador -->
            </tbody>
        </table>
        <a href="<?php echo site_url('empleados/agregar'); ?>" class="btn btn-add">+ AGREGAR NUEVO EMPLEADO</a>
    </div>
</body>
</html>
