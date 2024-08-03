<!DOCTYPE html>
<html>
<head>
    <title>Métricas de Empleados</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/dash.css'); ?>">
</head>
<body>
    <div class="dashboard">
        <?php $this->load->view('sidebar'); // Carga el sidebar ?>
        <main class="main-content">
            <section class="employee-management">
                <h1>METRICAS EMPLEADOS</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>E-Mail</th>
                            <th>Métricas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($empleados as $empleado): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($empleado['nom_usu']); ?></td>
                                <td><?php echo htmlspecialchars($empleado['app_usu']); ?></td>
                                <td><?php echo htmlspecialchars($empleado['email_usu']); ?></td>
                                <td>
                                    <button class="btn btn-edit">Ambientales</button>
                                    <button class="btn btn-delete">Personales</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
