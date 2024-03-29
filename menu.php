<nav class="navbar navbar-default" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Logotipo</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="TestUsuario.php">Inicio</a></li>
            <li><a href="TestUsuario.php">Administrador</a></li>
            <li><a href="TestAlumno.php">Alumno</a></li>
            <li><a href="TestMaestro.php">Maestro</a></li>
            <li><a href="TestAsignar-materia.php">Asignar materia profesor</a></li>
            <li><a href="TestAsignar-alumno.php">Asignar alumnos a grupo</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Maestro<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Acción #1</a></li>
                    <li><a href="#">Acción #2</a></li>
                    <li><a href="#">Acción #3</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Acción #4</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Acción #5</a></li>
                </ul>
            </li>
        </ul>

        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Enlace #3</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Menú #2 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Acción #1</a></li>
                    <li><a href="#">Acción #2</a></li>
                    <li><a href="#">Acción #3</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Acción #4</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>