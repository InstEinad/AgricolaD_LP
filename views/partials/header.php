<?php
// Simple header partial with navigation
?>
<header class="topbar">
  <div class="topbar-inner container">
    <div class="brand">AgricolaD</div>
    <nav class="main-nav">
      <ul>
        <li class="dropdown">Clientes
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">Productos
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">Distribuciones
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">Pedidos
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">Reportes
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">Usuarios
          <ul class="dropdown-menu">
            <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=crear">Nuevo</a></li>
            <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
