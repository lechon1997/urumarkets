<!--<nav class="navbar navbar-expand-lg">
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
<style type="text/css">
  body {
    background-color: #CCFDFF
}
</style>-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">UruMarket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">
          <i class="fa fa-home"></i>
          Inicio
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="VistaOferta">
          <i class="fa fa-shopping-bag">
            <span class="badge badge-danger">11</span>
          </i>
          Ofertas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrarEmpresas">
          <i class="fa fa-building-o">
            <span class="badge badge-danger">11</span>
          </i>
          Empresas
        </a>
      </li>
      <form class="form-inline my-2 my-lg-2">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form> 

    </ul>     
      <!--<li class="nav-item">
        <a class="nav-link disabled" href="#">
          <i class="fa fa-envelope-o">
            <span class="badge badge-warning">11</span>
          </i>
          Disabled
        </a>
      </li>-->

      <ul class="navbar-nav ">
      @guest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!--<i class="fa fa-envelope-o">
            <span class="badge badge-primary">11</span>
          </i>-->
          Ingresar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="loginUsuario">Iniciar Sesion</a>
          <a class="dropdown-item" href="registrarse">Registrarse</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      @else       
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-gift">
            <span class="badge badge-primary">11</span>
          </i>
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="altaProducto">Crear Producto</a>
          <a class="dropdown-item" href="listarProductos">Listar Productos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle">
           
          </i>
          Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="VermiPerfil">Ver mi Perfil</a>
          <a class="dropdown-item" href="MostrarModEmpresa">Modificar Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>        
      <li class="nav-item">
        <form action="cerrarSession" method="POST">
          @csrf
          <a class="nav-link" href="#" onclick="this.closest('form').submit()">
            <i class="fa fa-window-close">
              
            </i>
            Cerrar Sesion
            <span class="sr-only">(current)</span>
          </a>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-info">11</span>
          </i>
          
        </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-globe">
            <span class="badge badge-success">11</span>
          </i>
          Testbackground-image: linear-gradient(#343a40,#FAFAFA, #343a40);
        </a>
      </li>-->    
    @endguest  
    </ul>  
  </div>
</nav>

<style type="text/css">
  @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

html {
    height: 100%;
}
  body{
background: rgb(52,58,64);
background: linear-gradient(180deg, rgba(52,58,64,1) 0%, rgba(255,255,255,1) 53%);
background-repeat: no-repeat;
  }

  .navbar-icon-top .navbar-nav .nav-link > .fa {
    position: relative;
    width: 36px;
    font-size: 24px;
  }

  .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
    font-size: 0.75rem;
    position: absolute;
    right: 0;
    font-family: sans-serif;
  }

  .navbar-icon-top .navbar-nav .nav-link > .fa {
    top: 3px;
    line-height: 12px;
  }

  .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
    top: -10px;
  }

  @media (min-width: 576px) {
    .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
      text-align: center;
      display: table-cell;
      height: 70px;
      vertical-align: middle;
      padding-top: 0;
      padding-bottom: 0;
    }

    .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
      top: -7px;
    }
  }

  @media (min-width: 768px) {
    .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
      text-align: center;
      display: table-cell;
      height: 70px;
      vertical-align: middle;
      padding-top: 0;
      padding-bottom: 0;
    }

    .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
      top: -7px;
    }
  }

  @media (min-width: 992px) {
    .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
      text-align: center;
      display: table-cell;
      height: 70px;
      vertical-align: middle;
      padding-top: 0;
      padding-bottom: 0;
    }

    .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
      top: -7px;
    }
  }

  @media (min-width: 1200px) {
    .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
      text-align: center;
      display: table-cell;
      height: 70px;
      vertical-align: middle;
      padding-top: 0;
      padding-bottom: 0;
    }

    .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
      top: -7px;
    }
  }

</style>