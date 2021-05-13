<nav class="navbar navbar-expand-lg">
  <img src="../imagenes/logo.png">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="VistaOferta">Ofertas <span class="sr-only">(current)</span></a>
      </li>
      @guest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ingresar
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="loginUsuario">Iniciar Sesion</a>
          <a class="dropdown-item" href="registrarse">Registrarse</a>
        </div>
      </li class="nav-item active">
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="altaProducto">Crear Producto</a>
          <a class="dropdown-item" href="listarProductos">Listar Productos</a>
        </div>
      </li class="nav-item active">
      <li class="nav-item active">
        <form action="cerrarSession" method="POST">
          @csrf
          <a class="nav-link" href="#" onclick="this.closest('form').submit()">Cerrar Sesión <span class="sr-only">(current)</span></a>
        </form>
      </li>
      @endguest
      <li class="nav-item active">
        <a class="nav-link" href="mostrarEmpresas">Empresas <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
<!--<style type="text/css">
  body {
    background-color: #CCFDFF
}
</style>-->