<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">

  <img src="http://localhost/urumarkets/imagenes/logo7.png" style="width:7%;">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav" style="flex-grow: 1;">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/urumarkets/public/index">
          <i class="fa fa-home"></i>
          Inicio
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/urumarkets/public/VistaOferta">
          <i class="fa fa-shopping-bag">
            <span class="badge badge-danger">11</span>
          </i>
          Ofertas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/urumarkets/public/mostrarEmpresas">
          <i class="fa fa-building-o">
          </i>
          Empresas
        </a>
      </li>
      @guest
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-gift">
            <span class="badge badge-danger">11</span>
          </i>
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/urumarkets/public/altaProducto">Crear publicación</a>
          <a class="dropdown-item" href="http://localhost/urumarkets/public/listarProductos">Administrar publicaciones</a>
        </div>
      </li>
      @endguest

    </ul>

    <div style="flex-grow: 15;">
    <div class="d-flex w-75" style="margin: 0 auto;">
      <input id="textobuscador" class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
      <button id="buscador" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </div>
    </div>
    
    <ul class="navbar-nav " style="flex-grow: 1;">
      @guest
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!--<i class="fa fa-envelope-o">
            <span class="badge badge-primary">11</span>
          </i>-->
          Ingresar
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/urumarkets/public/loginUsuario">Iniciar Sesion</a>
          <a class="dropdown-item" href="http://localhost/urumarkets/public/registrarse">Registrarse</a>
        </div>
      </li>
      @else
      <div class="d-flex">
        <button id="carrito" class="btn btn-outline-success" type="submit" onclick="location.href='http://localhost/urumarkets/public/Carrito'">
          <i class="bi-cart-fill me-1"></i>
          Carrito
          <span id ="spanCarrito" class="badge badge-success">0</span>
        </button>
      </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle">
          </i>
          Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/urumarkets/public/VermiPerfil">Ver mi Perfil</a>
          <a class="dropdown-item" href="http://localhost/urumarkets/public/MostrarModEmpresa">Modificar Perfil</a>
          <a class="dropdown-item" href="http://localhost/urumarkets/public/MostrarHistorialVentas">Historial de ventas</a>
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
      <!--
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-info">11</span>
          </i>
          
        </a>
      </li>-->
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
<script type="text/javascript">
  $('#buscador').on('click', function() {
        $texto = $(textobuscador).val();
        var textoxd = $("#textobuscador").val();
        if(textoxd == ""){
          alert("Debe ingresar un texto para buscar.");
          return false;
        }else{
          console.log($texto);
          $url = "http://localhost/urumarkets/public/buscar/" + $texto;
          console.log($url);
          window.location.href=$url;     
        }        
    });
</script>

<style type="text/css">
  @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
  body{
      background-color: #ECE8E8;
    }
  
  .navbar-icon-top .navbar-nav .nav-link>.fa {
    position: relative;
    width: 36px;
    font-size: 24px;
  }

  .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
    font-size: 0.75rem;
    position: absolute;
    right: 0;
    font-family: sans-serif;
  }

  .navbar-icon-top .navbar-nav .nav-link>.fa {
    top: 3px;
    line-height: 12px;
  }

  .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
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

    .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa>.badge {
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

    .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa>.badge {
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

    .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa>.badge {
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

    .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa {
      display: block;
      width: 48px;
      margin: 2px auto 4px auto;
      top: 0;
      line-height: 24px;
    }

    .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa>.badge {
      top: -7px;
    }

    #carrito {
      margin: 16px;
    }
</style>