<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Administración Referidos</span>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="mailbox.html">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Tienes 16 mensajes
                            <span class="pull-right text-muted small">Hace 4 minutos</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-gift fa-fw"></i> 3 Nuevas Promociones
                            <span class="pull-right text-muted small">Hace 12 minutos</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="text-center link-block">
                        <a href="#">
                            <strong>Ver todas las notificaciones</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>
