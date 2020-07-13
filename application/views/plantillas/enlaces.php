 


<div class="container col-md-6 col-sm-12 mb-2 p-0">
    <ul class="nav justify-content-end ">
      <li class="nav-item">
        <a class="nav-link active" href="/crediweb/welcome">
          Inicio
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/crediweb/cliente">Clientes</a>
      </li>

      <?php if( $this->session->userdata("tipo") == "S"): ?>
          <li class="nav-item">
            <a class="nav-link  text-light" href="/crediweb/usuario">Usuarios</a>
          </li>
      <?php  endif; ?>

      <li class="nav-item">

 
            <div class="dropdown dropleft">
            <button class="btn btn-info btn-md dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=   $this->session->userdata("usuario")?>
            </button>
            <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item  text-light" href="/crediweb/usuario/edit/<?=$this->session->userdata("id")?>/1">Mis datos</a>
            <a class="dropdown-item  text-light" href="/crediweb/usuario/sign_out">Cerrar sesion</a>
              
            </div>
          </div>
      </li>
    </ul>
</div>
