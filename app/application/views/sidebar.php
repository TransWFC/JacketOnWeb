<div class="dashboard">
    <aside class="sidebar">
        <h2>Jacket - On</h2>
        <nav>
            <ul>
                <li class="<?php echo ($this->uri->segment(1) == 'supervisores') ? 'active current' : ''; ?>">
                    <a href="<?php echo site_url('supervisores'); ?>">GESTION DE SUPERVISORES</a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'empleados') ? 'active current' : ''; ?>">
                    <a href="<?php echo site_url('empleados'); ?>">GESTION DE EMPLEADOS</a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'actividades') ? 'active current' : ''; ?>">
                    <a href="<?php echo site_url('actividades'); ?>">GESTION DE ACTIVIDADES</a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'graficas_reportes') ? 'active current' : ''; ?>">
                    <a href="<?php echo site_url('graficas_reportes'); ?>">GRAFICAS Y REPORTES</a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'metricas') ? 'active current' : ''; ?>">
                    <a href="<?php echo site_url('metricas'); ?>">METRICAS</a>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="main-content">
        <header class="header">
            <h3>¡Hola! Te damos la bienvenida a tu panel de control</h3>
            <div class="header-right">
                <div class="search-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F2E527" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                        <path d="M21 21l-6 -6"/>
                    </svg>
                    <input type="text" placeholder="Buscar..." />
                </div>
                <div class="user-icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="#F2E527" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"/>
                    </svg>
                    <div class="dropdown-menu">
                        <a href="#">Editar perfil</a>
                        <a href="#">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <?php
            // Verifica si $content está definida y no está vacía
            if (isset($content) && !empty($content)) {
                $this->load->view($content);
            } else {
                echo 'No se ha definido contenido para mostrar.';
            }
            ?>
        </div>
    </main>
</div>
